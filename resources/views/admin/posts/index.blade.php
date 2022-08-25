@extends('layouts.app')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <table class="table">
        <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Title</th>
            <th scope="col">Author</th>
            <th scope="col">Category</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td><a href="{{route('admin.posts.show', ['post' => $post])}}">{{$post->title}}</a></td>
                <td>{{$post->user->name}}</td>
                <td>{{$post->category->name}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{$posts->links()}}
@endsection
