@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Product</h1>
</div>
<form action="{{url('product/store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" name="nama_produk"
            aria-describedby="emailHelp">
        @error('nama_produk')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control @error('harga') is-invalid @enderror">
        @error('harga')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" name="deskripsi"
            id="exampleFormControlTextarea1" rows="3"></textarea>
        @error('deskripsi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="category">Category</label>
        <select class="form-select" id="inputGroupSelect01" name="kategori_id">
            @foreach ($category as $c)
            <option value="{{ $c->id}}">{{ $c->nama_kategori}}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" name="gambar" type="file" id="formFile" accept="image/*">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection