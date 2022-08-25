@extends('admin.dashboard')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-info mb-3 ms-3">Back</a>

<div class="d-flex">
    @include('admin/partials/side-nav')

    <table class="table container">
        <thead class="table-primary">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone</th>
            <th scope="col">Birth</th>

        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>

                {{-- IN ASSENZA DEL SEED DEI DETAILS CORRISPONDENTE AL SEED DELI USERS OCCORRE UN IF CHE VADA A GESTIRE IL CASO DI MANCANZA DEI DATI IN USERDETAILS --}}
                @php
                    $details = $user->userDetails()->first()
                @endphp

                <td>{{$details ? ($details->address ?: '__________') : '__________'}}</td>
                <td>{{$details ? ($details->phone ?: '__________') : '__________'}}</td>
                <td>{{$details ? ($details->birth ?: '__________') : '__________'}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>


{{$users->links()}}
@endsection
