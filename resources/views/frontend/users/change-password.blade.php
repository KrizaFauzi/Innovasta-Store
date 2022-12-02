@extends('layouts.main')
@section('title','Change Password')
@section('content')

<style>
    .forgot {
        text-decoration: none;
    }
    
    .forgot:hover {
        text-decoration: underline;
    }
</style>

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
    <div class="toast-container position-fixed top-auto end-0 p-3">
        <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                <strong class="me-auto">GoodFance Bag</strong>
                <!-- <small>11 mins ago</small> -->
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body bg-white rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li class="text-danger">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endif

<div class="py-5 bg-white">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0">
                    <div class="card-header bg-transparent border-0 p-0 mb-3">
                        <h3 class="mb-0">Change Password
                            <a href="{{ url('profile') }}" class="btn border rounded-5 float-end" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                                <img src="https://img.icons8.com/ios-glyphs/17/null/chevron-left.png"/> Back
                            </a>
                        </h3>
                    </div>
                    <div class="card-body border rounded-2">
                        <form action="{{ url('change-password') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label style="font-size: 17px; margin-bottom: 3px;">Current Password</label>
                                <input type="password" name="current_password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label style="font-size: 17px; margin-bottom: 3px;">New Password</label>
                                <input type="password" name="password" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label style="font-size: 17px; margin-bottom: 3px;">Confirm Password</label>
                                <input type="password" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="d-flex justify-content-between mb-3">
                                <a class="forgot" href="{{ url('password/reset') }}">
                                    Forgot your password?
                                </a>
                                <button type="submit" class="btn btn-warning rounded-3" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                                    Update Password
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection