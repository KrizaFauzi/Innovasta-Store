@extends('layouts.seller')
@section('content')

@if (session('message'))
<div class="toast-container position-fixed top-auto end-0 p-3">
    <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
            <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
            <strong class="me-auto">GoodFance Bag</strong>
            {{-- <small>11 mins ago</small> --}}
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body bg-white rounded">
            {{ session('message') }}
        </div>
    </div>
</div>
@endif

<div class="me-md-3 me-xl-5">
    <h2>Dashboard</h2>
    <p class="mb-md-0">Analisis dashboard</p>
    <hr>
</div>

<div class="row row-cols-1 row-cols-lg-4">
    <div class="col mb-2 mb-lg-0">
        <div class="card text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Total Orders</h5>
                <hr class="mt-3 mb-0">
                <p class="card-text fs-3 fw-bold">{{ $totalOrder }}</p>
                <a href="{{ url('seller/orders') }}" class="text-black fw-bold">
                    View
                </a>
            </div>
        </div>
    </div>

    <div class="col mb-2 mb-lg-0">
        <div class="card text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Today Orders</h5>
                <hr class="mt-3 mb-0">
                <p class="card-text fs-3 fw-bold">{{ $todayOrder }}</p>
                <a href="{{ url('seller/orders') }}" class="text-black fw-bold">
                    View
                </a>
            </div>
        </div>
    </div>

    <div class="col mb-2 mb-lg-0">
        <div class="card text-center h-100">
            <div class="card-body">
                <h5 class="card-title">This Month Orders</h5>
                <hr class="mt-3 mb-0">
                <p class="card-text fs-3 fw-bold">{{ $thisMonthOrder }}</p>
                <a href="{{ url('seller/orders') }}" class="text-black fw-bold">
                    View
                </a>
            </div>
        </div>
    </div>

    <div class="col mb-2 mb-lg-0">
        <div class="card text-center d-flex align-items-center h-100">
            <div class="card-body">
                <h5 class="card-title">Year Orders</h5>
                <hr class="mt-3 mb-0">
                <p class="card-text fs-3 fw-bold">{{ $thisYearOrder }}</p>
                <a href="{{ url('seller/orders') }}" class="text-black fw-bold">
                    View
                </a>
            </div>
        </div>
    </div>
</div>

<hr>
<div class="row row-cols-1 row-cols-lg-4">
    <div class="col mb-2 mb-lg-0">
        <div class="card text-center h-100">
            <div class="card-body">
                <h5 class="card-title">Total Products</h5>
                <hr class="mt-3 mb-0">
                <p class="card-text fs-3 fw-bold">{{ $totalProducts }}</p>
                <a href="{{ url('seller/products') }}" class="text-black fw-bold">
                    View
                </a>
            </div>
        </div>
    </div>
</div>

@endsection
