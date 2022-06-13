@extends('template.main')

@section('content')
<form action="{{url('category/edit/'. $category->id)}}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Kategori</label>
        <input type="text" class="form-control" name="nama_kategori" aria-describedby="emailHelp"
            value="{{$category->nama_kategori}}">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection