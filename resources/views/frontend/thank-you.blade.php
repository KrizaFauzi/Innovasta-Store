@extends('layouts.main')
@section('title', 'Thank You for Shopping')
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

<div class="py-3 pyt-md-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">


                <div class="p-4 shadow bg-white">
                    <!-- <h2>Logo</h2> -->
                    <h4>Thank You for Shopping with us</h4>
                    <!-- <a href="{{ url('/') }}" class="btn btn-primary">Shop now</a> -->
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
