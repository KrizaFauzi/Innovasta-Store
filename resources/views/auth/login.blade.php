@extends('layouts.app')
@section('title', 'Login')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-transparent border-0 pb-0" style="font-size: 30px;">
                    {{ __('Login') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="mb-2">
                            <p class="mb-0" for="email">{{ __('Email Address') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="d-flex justify-content-between">
                                <p class="mb-0" for="password" class="">
                                    {{ __('Password') }} 
                                </p>
                                @if (Route::has('password.request'))
                                    <a class="forgot" style="font-size: 15px" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        {{-- <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div> --}}

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                    <div>
                        <p class="" style="font-size: 17px;">New in GoodFance Bag?</p>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-light border w-100 shadow-sm" href="{{ url('/register') }}">Create your GoodFance Bag account</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
