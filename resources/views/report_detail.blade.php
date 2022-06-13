@extends ('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Details Transaction</h1>
</div>
<div class="container rounded shadow px-5 py-5">
    <h1 class="fs-6">Invoice :</h1>
    <h4 class="fw-bolder text-primary mb-3">{{$detail->transaksi->kode_transaksi}}</h4>
    <h1 class="fs-6">Tanggal Pembelian :</h1>
    <h4 class="fw-bolder">{{$detail->transaksi->tanggal}}</h4>
    <div class="border-bottom">
    </div>
    <div class="row mt-5">
        <div class="col-md-6">
            <h1 class="fs-6">Produk :</h1>
            <img src="{{asset('storage/gambar/'. $detail->produk->gambar)}}" alt="..." class="img-fluid my-3">
            <h4 class="fw-bolder text-uppercase">{{$detail->produk->nama_produk}}</h4>
        </div>
        <div class="col-md-6">
            <h1 class="fs-6">Harga Produk :</h1>
            <h4 class="fw-bolder mb-3">Rp {{number_format(intval($detail->produk->harga),2)}}</h4>
            <h1 class="fs-6">Jumlah Pembelian :</h1>
            <h4 class="fw-bolder">{{$detail->jumlah}}</h4>
        </div>
        <a href="{{url('report')}}" class="btn btn-primary text-center mt-5">Go Back</a>
    </div>
</div>
@endsection