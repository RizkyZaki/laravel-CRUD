@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Admin List</h1>
</div>
@if(session()->has('berhasil'))
<div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
    <strong>{{ session('berhasil')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="shadow mt-3 px-3 py-3 rounded">
    <div class="d-block my-3">
        <a class="btn btn-primary" href="{{url('admin/create')}}" role="button">Add Admin</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Admin</th>
                <th>Email Admin</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $nomor = 1;
            @endphp
            @foreach ($admin as $admins)
            <tr>
                <td>{{$nomor}}</td>
                <td>{{$admins->name}}</td>
                <td>{{$admins->email}}</td>
                <td class="text-center">
                    <a class="btn btn-danger btn-sm" href="" role="button">Delete</a>
                </td>
            </tr>
            @php
            $nomor++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection