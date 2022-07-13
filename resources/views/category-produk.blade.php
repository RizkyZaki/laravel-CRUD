@extends('template.main')

@section('content')
<div class="shadow mt-3 px-3 py-3 rounded">
    <div class="d-block my-3">
        <a class="btn btn-primary" href="{{url('category/create')}}" role="button">Create Category</a>
    </div>
    <h1>{{$kategori}}</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
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
            </tr>
            @php
            $nomor++;
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection