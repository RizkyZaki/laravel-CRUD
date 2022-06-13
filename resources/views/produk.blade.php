@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Product List</h1>
</div>
@if(session()->has('berhasil'))
<div class="alert alert-primary alert-dismissible fade show mt-2" role="alert">
    <strong>{{ session('berhasil')}}</strong>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
<div class="shadow mt-3 px-3 py-3 rounded">
    <div class="d-block my-3">
        <a class="btn btn-primary" href="{{url('product/create')}}" role="button">Create Produk</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Produk</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @php
            $nomor = 1;
            @endphp
            @foreach ($produk as $item)
            <tr>
                <td>{{$nomor}}</td>
                <td>{{$item->nama_produk}}</td>
                <td>{{$item->category->nama_kategori}}</td>
                <td>Rp {{number_format(intval($item->harga),2)}}</td>
                <td class="text-center"><a class="btn btn-primary btn-sm" href="{{url('product/edit/'. $item->id)}}"
                        role="button">Edit</a>
                    <a class="btn btn-success btn-sm" href="{{url('product/show/'. $item->id)}}"
                        role="button">Detail</a>
                    <a class="btn btn-danger btn-sm" href="{{url('product/delete/'. $item->id)}}"
                        role="button">Delete</a>
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