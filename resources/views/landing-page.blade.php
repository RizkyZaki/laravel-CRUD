@extends('template.landing')

@section('content')
<h1 class="text-center fw-bold mb-5">Product</h1>
<div class="row">
    @foreach ($produk as $p)
    <div class="col-6 col-md-2 mb-4">
        <div class="card rounded shadow-sm">
            <img src=" {{asset('storage/gambar/'. $p->gambar)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$p->nama_produk}}</h5>
                <p class="card-text fs-5 fw-bolder">Rp {{number_format(intval($p->harga),2)}}</p>
                <p class="text-muted fs-7">{{$p->category->nama_kategori}}</p>
                <a href="{{url('/landing/checkout')}}" class="btn btn-primary">Buy Now</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection