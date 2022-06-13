@extends('template.main')

@section('content')
<form action="{{url('product/edit/'. $produk->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" name="nama_produk" aria-describedby="emailHelp"
            value="{{$produk->nama_produk}}">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Harga</label>
        <input type="number" name="harga" class="form-control" value="{{$produk->harga}}">
    </div>
    <div class="mb-3">
        <label for="exampleFormControlTextarea1" class="form-label">Deskripsi</label>
        <textarea class="form-control" name="deskripsi" id="exampleFormControlTextarea1"
            rows="3">{{$produk->deskripsi}}</textarea>
    </div>
    <div class="mb-3">
        <label for="formFile" class="form-label">Default file input example</label>
        <input class="form-control" name="gambar" type="file" id="formFile" value="{{$produk->gambar}}">
    </div>
    <div class="input-group mb-3">
        <label class="input-group-text" for="category">Category</label>
        <select class="form-select" id="inputGroupSelect01" name="kategori_id">
            @foreach ($category as $c)
            <option value="{{ $c->id}}">{{ $c->nama_kategori}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection