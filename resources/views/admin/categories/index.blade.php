@extends('layouts.app')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <table class="table">
        <thead class="table-primary">
        <tr>
            <th scope="col">Name</th>
            <th scope="col">Descrition</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->name}}</td>
                <td>{{$category->description}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{-- {{$categories->links()}} --}}
@endsection
