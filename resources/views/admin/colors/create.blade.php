@extends('layouts.admin')
@section('content')

<!-- Text Tambah Warna -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Tambah Warna</p>
</div>
<!-- End Text Tambah Warna -->

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

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">
    @if ($errors->any())
        <div class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <div>{{$error}}</div>
            @endforeach
        </div>
    @endif

    <form action="{{ url('admin/colors/create') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Warna</label>
            <input type="text" name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Code Warna</label>
            <input type="text" name="code" class="form-control">
        </div>
        <div class="mb-3">
            <label>Status</label> <br>
            <input type="checkbox" name="status"> Checked=Hidden,UnChecked=Visible;
        </div>
        <div class="mb-3">
            <button type="submit" class="btn btn-primary shadow">
                Save
            </button>
        </div>
    </form>
</div>
@endsection