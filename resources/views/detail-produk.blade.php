@extends('template.main')

@section ('content')
<div class="row">
    <div class="col-md-3">
        <img src="{{asset('storage/gambar/'. $produk->gambar)}}" alt="..." class="img-fluid my-3">
    </div>
    <div class="col-md-9 py-4">
        <h2 class="fw-bold">{{$produk->nama_produk}}</h2>
        <h1 class="my-2">Rp {{number_format(intval($produk->harga),2)}}</h1>
        <p class="border-bottom border-top fs-5 text-muted mt-4 mb-2 text-center">Deskripsi Produk</p>
        <h5>Kategori : <span class="text-primary fw-bold">{{$produk->category->nama_kategori}}</span></h5>
        <p class="fs-6">{{$produk->deskripsi}}</p>
    </div>
</div>
@endsection