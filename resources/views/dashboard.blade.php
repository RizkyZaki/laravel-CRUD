@extends('template.main')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Dashboard</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
        </button>
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card mb-3 px-3 py-3 rounded shadow ">
            <div class=" row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Kategori</h5>
                        <h3 class="fw-bold">{{$category}}</h3>
                    </div>
                </div>
                <div class="col-md-3 ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                        class="bi bi-bookmark" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 px-3 py-3 rounded shadow ">
            <div class=" row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title text-success">Produk</h5>
                        <h3 class="fw-bold">{{$produk}}</h3>
                    </div>
                </div>
                <div class="col-md-3 ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor" class="bi bi-bag"
                        viewBox="0 0 16 16">
                        <path
                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card mb-3 px-3 py-3 rounded shadow ">
            <div class=" row g-0">
                <div class="col-md-6">
                    <div class="card-body">
                        <h5 class="card-title text-danger">Admin</h5>
                        <h3 class="fw-bold">{{$admin}}</h3>
                    </div>
                </div>
                <div class="col-md-3 ms-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="currentColor"
                        class="bi bi-person-badge-fill" viewBox="0 0 16 16">
                        <path
                            d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2zm4.5 0a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm5 2.755C12.146 12.825 10.623 12 8 12s-4.146.826-5 1.755V14a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-.245z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection