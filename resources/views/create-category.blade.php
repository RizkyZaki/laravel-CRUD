@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create Product</h1>
</div>
<form action="{{url('category/store')}}" method="POST">
    @csrf
    <div class=" mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control @error ('nama_kategori') is-invalid @enderror" name="nama_kategori"
            aria-describedby="emailHelp">
        @error('nama_kategori')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection