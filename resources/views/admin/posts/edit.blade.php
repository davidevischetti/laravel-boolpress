@extends('layouts.app')


@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <form action="{{route('admin.posts.update',['post' => $post])}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="series">slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{$post->slug}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">image</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" value="{{old('image', $post->image)}}">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="type">content</label>
            <input class="form-control" type="text" name="content" id="content" value="{{$post->content}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="price">excerpt</label>
            <input class="form-control" type="text" name="excerpt" id="excerpt" value="{{$post->excerpt}}">
        </div>
        <div class="mb-3">
            <label class="form-label" for="category_id">category</label>
            <select name="category_id" id="category_id">
                <option disabled value="">Select the post category...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == old('category_id', $post->category_id)) selected @endif>{{$category->name}}</option>
                @endforeach
            </select>
        </div>
        <fieldset class="mb-3">
            <legend>tags</legend>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}"
                    @if(in_array($tag->id, old('tags', $post->tags->pluck('id')->all()) ?: [])) checked @endif >
                    <label for="tag-{{$tag->id}}" class="fomr-check-label">{{$tag->name}}</label>
                </div>
            @endforeach
        </fieldset>
        <button class="btn btn-primary" type="submit">Confirm</button>
    </form>

</div>



@endsection
