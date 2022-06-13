@extends ('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Transaction List</h1>
</div>

<div class="row">
    @foreach ($customer as $t)
    <div class="col-md-6">
        <div class="card mb-3">
            <div class="card-header fs-6">
                History Transaksi
            </div>
            <div class="card-body">
                <h5 class="card-title">{{$t->customer->nama_lengkap}}</h5>
                <h5 class="card-text">{{$t->tanggal}}</h5>
                <h5 class="card-text fs-6">Alamat : {{$t->customer->alamat_lengkap}}</h5>
                <h5 class="card-text fs-6">Email : {{$t->customer->email}}</h5>
                <a href="{{url('report/detail/'.$t->id)}}" class="btn btn-primary mt-4">Details</a>
            </div>
        </div>
    </div>
    @endforeach
</div>



@endsection