@extends('layouts.app')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <div class="container">
        <h1>{{$post->title}}</h1>
        <img src="{{asset('storage/' . $post->image)}}" alt="">
        <p class="content">{{$post->content}}</p>
        <h3>Author:{{$post->user->name}}</h3>
        <div>Category:{{$post->category->name}}</div>
        <span>Tags:</span>
        @foreach($post->tags as $tag)
            <span>{{ $tag->name }}</span>
            @if(!$loop->last) , @endif
        @endforeach

        @if(Auth::id() == $post->user_id)
            <div id="buttons">
                <button class="btn btn-success mt-3"><a href="{{route('admin.posts.edit', ['post' => $post])}}">Edit</a></button>
                <button class="btn btn-danger js-delete mt-3"><a>Delete</a></button>
            </div>
        @endif
    </div>

</div>

<section class="overlay d-none">

    <form class="popup" action="{{route('admin.posts.destroy', ['post'=> $post])}}" method="post">
    @csrf
    @method('delete')
    <h4>Vuoi eliminare questo elemento?</h4>
    <button type="submit" class="btn btn-success js-yes">SI</button>
    <button type="button" class="btn btn-danger js-no">NO</button>
    </form>

</section>

@endsection
