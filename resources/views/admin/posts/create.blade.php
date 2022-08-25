@extends('layouts.app')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <form class="container" action="{{route('admin.posts.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label class="form-label" for="title">title</label>
            <input class="form-control" type="text" name="title" id="title" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="slug">slug</label>
            <input class="form-control" type="text" name="slug" id="slug" value="{{old('slug')}}">
            @error('slug')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="image">image</label>
            <input class="form-control" type="file" name="image" id="image" accept="image/*" value="{{old('image')}}">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="content">content</label>
            <textarea class="form-control" name="content" id="content" value="{{old('content')}}"></textarea>
            @error('content')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label" for="excerpt">excerpt</label>
            <textarea class="form-control" name="excerpt" id="excerpt" value="{{old('excerpt')}}"></textarea>
            @error('excerpt')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label" for="category_id">category</label>
            <select name="category_id" id="category_id">
                <option disabled value="">Select the post category...</option>
                @foreach ($categories as $category)
                    <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif >{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </div>

        <fieldset class="mb-3">
            <legend>tags</legend>
            @foreach ($tags as $tag)
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="tags[]" value="{{$tag->id}}" id="tag-{{$tag->id}}"
                        @if(in_array($tag->id, old('tags') ?: [])) checked @endif>
                    <label for="tag-{{$tag->id}}" class="fomr-check-label">{{$tag->name}}</label>
                </div>
            @endforeach
            @error('tags')
            <div class="invalid-feedback">
                {{$message}}
            </div>
            @enderror
        </fieldset>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>

</div>



@endsection
