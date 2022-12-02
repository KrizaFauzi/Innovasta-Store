@extends('layouts.admin')
@section('title', 'Edit User')
@section('content')

<!-- Text Tambah Produk -->
<div class="d-flex justify-content-between bg-white shadow-sm rounded-1 align-items-center py-2 px-3">
    <p class="fw-bold my-auto" style="font-size: 23px;">Tambah User
        {{-- <a href="{{ url('admin/users') }}" class="btn btn-danger btn-sm text-white float-end">
            Back
        </a> --}}
    </p>
</div>
<!-- End Text Tambah Produk -->

<div class="bg-white shadow-sm rounded-1 p-3 mt-2">

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

    @if ($errors->any())
        <ul class="alert alert-warning">
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('admin/users/'.$user->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-md-6 mb-3">
                <label>Name</label>
                <input type="text" name="name" value="{{ $user->name }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Email</label>
                <input type="text" name="email" disabled readonly value="{{ $user->email }}" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Password</label>
                <input type="text" name="password" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label>Select Role</label>
                <select name="role_as" class="form-control">
                    <option value="">Select Role</option>
                    <option value="0" {{ $user->role_as == '0' ? 'selected':'' }}>User</option>
                    <option value="1" {{ $user->role_as == '1' ? 'selected':'' }}>Admin</option>
                </select>
            </div>
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
</div>

@endsection