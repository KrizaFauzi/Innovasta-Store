@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header bg-transparent border-0 pb-0" style="font-size: 30px;">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="mb-3">
                            <p class="mb-0" for="email">{{ __('Email Address') }}</p>

                            <div class="col-md-12">
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

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
                                <input style="box-shadow: rgb(204, 219, 232) 0.1px 0.1px 2px 0px inset, rgba(255, 255, 255, 0.5) -1px -1px 6px 1px inset; padding-top: 5px; padding-bottom: 5px;" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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

                        <div class="row mb-0">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
