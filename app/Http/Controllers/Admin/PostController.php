<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    protected $validation_rules = [
        'title' => 'required|string|max:100',
        'slug' => ['required','string','max:100',],
        'category_id' => 'required|exists:categories,id',
        'tags' => 'nullable|array',
        'tags.*' =>'integer|exists:tags,id',
        // 'image' =>'required_without:content|nullable|url',
        'image' =>'required_without:content|nullable|file|image|max:1024',
        'content' =>'required_without:image|nullable|string|max:5000',
        'excerpt' => 'nullable|string|max:200'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(5);

        return view('admin.posts.index', compact('posts'));
    }

    public function myIndex()
    {
        $posts = Auth::user()->posts()->paginate(5);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validation_rules['slug'][] = 'unique:posts';
        $request->validate($this->validation_rules);

        // dump($request->all());
        $form_data = $request->all();

        if (key_exists('image', $form_data)) {
            $img_path = Storage::put('uploads', $form_data['image']);
            $form_data['image'] = $img_path;
        }



        $formData = $form_data + [
            'user_id' => Auth::id()
        ];

        $post = Post::create($formData); // con protected $fillable nel model
        $post->tags()->sync($formData['tags']);

        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if (Auth::id() != $post->user_id) abort(401);

        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $this->validation_rules['slug'][] = Rule::unique('posts')->ignore($post->id);
        $request->validate($this->validation_rules);

        $formData = $request->all();

        if(key_exists('image', $formData)) {
            if($post->image) {
                Storage::delete($post->image);

                $img_path = Storage::put('uploads', $formData['image']);
                $formData['image'] = $img_path;
            }
        }
        $post->update($formData);// con protected $fillable nel model
        $post->tags()->sync($formData['tags']);

        return redirect()->route('admin.posts.show', ['post' => $post]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Auth::id() != $post->user_id) abort(401);

        $post->tags()->detach();
        $post->delete();

        return redirect()->route('admin.posts.index');
    }
}
