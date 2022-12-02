@extends('layouts.app')
@section('title', 'Register')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-transparent border-0 pb-0" style="font-size: 30px;">
                    {{ __('Register') }}
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <p class="mb-0" for="name">{{ __('Name') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-0" for="email">{{ __('Email Address') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-0" for="password">{{ __('Password') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 12px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <p class="mb-0" for="password-confirm">{{ __('Confirm Password') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Register') }}
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
                        <p class="" style="font-size: 17px;">Already have an account?</p>
                    </div>
                    <div class="col-md-12">
                        <a class="btn btn-light border w-100 shadow-sm" href="{{ url('/login') }}">Login here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
