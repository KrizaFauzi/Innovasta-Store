@extends('layouts.main')
@section('title', 'User Profile')
@section('content')

@if (session('message'))
    <div class="toast-container position-fixed top-auto end-0 p-3">
        <div id="liveToast" class="toast show border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <div class="bg-info rounded me-2 shadow-sm" style="padding: 11px;"></div>
                <strong class="me-auto">GoodFance Bag</strong>
                <!-- <small>11 mins ago</small> -->
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
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3>Manage Your Profile
                    <a href="{{ url('change-password') }}" class="btn border float-end rounded-5" style="box-shadow: rgba(0, 0, 0, 0.05) 0px 1px 2px 0px;">
                        Ubah Password <img src="https://img.icons8.com/ios-glyphs/17/null/chevron-right.png"/>
                    </a>
                </h3>
            </div>

            <div class="col-md-10 mt-3">
                <div class="card bg-transparent">
                    <div class="card-body">
                        <form action="{{ url('profile') }}" method="POST">
                            @csrf
                            
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="font-size: 17px; margin-bottom: 3px;">Username</label>
                                        <input type="text" name="username" value="{{ Auth::user()->name }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="font-size: 17px; margin-bottom: 3px;">Email Address</label>
                                        <input type="text" disabled readonly value="{{ Auth::user()->email }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="font-size: 17px; margin-bottom: 3px;">Phone Number</label>
                                        <input type="text" name="phone" value="{{ Auth::user()->userDetail->phone ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label style="font-size: 17px; margin-bottom: 3px;">Zip/Pin Code</label>
                                        <input type="text" name="pin_code" value="{{ Auth::user()->userDetail->pin_code ?? '' }}" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label style="font-size: 17px; margin-bottom: 3px;">Address</label>
                                        <textarea name="address" class="form-control" rows="3">{{ Auth::user()->userDetail->address ?? '' }}</textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-warning">Save Data</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 
@endsection