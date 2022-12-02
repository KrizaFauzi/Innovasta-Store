@extends('layouts.admin')
@section('title', 'Admin Setting')
@section('content')

<div class="row">
    <div class="col-md-12 grid-margin">

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

        <form action="{{ url('/admin/settings') }}" method="POST">
            @csrf

            {{-- Website --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="text-black mb-0">Website</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Website Name</label>
                            <input type="text" name="website_name" value="{{ $setting->website_name }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Website URL</label>
                            <input type="text" name="website_url" value="{{ $setting->website_url }}" class="form-control">
                        </div>
                        <div class="col-md-12 mb-3 d-none">
                            <label>Page Title</label>
                            <input type="text" name="page_title" value="{{ $setting->page_title }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tentang Kami</label>
                            <textarea name="meta_keyword" class="form-control" rows="3">{{ $setting->meta_keyword }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Tujuan Kami</label>
                            <textarea name="meta_description" class="form-control" rows="3">{{ $setting->meta_description }}</textarea>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Website - Information --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="text-black mb-0">Website - Information</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <textarea name="address" class="form-control" rows="3">{{ $setting->address }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1 *</label>
                            <input type="text" name="phone1" value="{{ $setting->phone1 }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone No. 2</label>
                            <input type="text" name="phone2" value="{{ $setting->phone2 }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Id 1 *</label>
                            <input type="text" name="email1" value="{{ $setting->email1 }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email Id 2</label>
                            <input type="text" name="email2" value="{{ $setting->email2 }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            {{-- Website - Social Media --}}
            <div class="card mb-3">
                <div class="card-header">
                    <h3 class="text-black mb-0">Website - Social Media</h3>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Facebook (Optional)</label>
                            <input type="text" name="facebook" value="{{ $setting->facebook }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Twitter (Optional)</label>
                            <input type="text" name="twitter" value="{{ $setting->twitter }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Instagram (Optional)</label>
                            <input type="text" name="instagram" value="{{ $setting->instagram }}" class="form-control">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Youtube (Optional)</label>
                            <input type="text" name="youtube" value="{{ $setting->youtube }}" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary text-white shadow">
                    Save Settings
                </button>
            </div>

        </form>
    </div>
</div>

@endsection