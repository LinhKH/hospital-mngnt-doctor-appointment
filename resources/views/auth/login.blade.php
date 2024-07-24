@extends('layouts.app')

@section('title','Login')

@section('content')

    <div class="banner-area">
        <div class="banner-overlay py-5">
            <div class="container">
                <h4 class="banner-heading">Login</h4>
                <div class="banner-link">
                    <a href="{{ url('/') }}"> Home </a> /
                    <a href="javascript:void(0)" class="active"> Login </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">{{ __('Login') }}</h4>
                        </div>
                        <div class="card-body">
                            <div class="mb-3 bg-danger-subtle">
                                <p>Admin : admin@gmail.com/password</p>
                                <p>Docotor : doctor@gmail.com/password</p>
                                <p>User : mr.linh1090@gmail.com/12345678</p>
                            </div>
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="mb-3">
                                    <label for="email">{{ __('Email Address') }}</label>

                                    <input id="email" type="email" class="custom-form-control form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="password">{{ __('Password') }}</label>

                                    <input id="password" type="password" class="custom-form-control form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="row ">
                                    <div class="col-md-6 mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember"> {{ __('Remember Me') }} </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3 text-center">
                                            @if (Route::has('password.request'))
                                                <a href="{{ route('password.request') }}">
                                                    {{ __('Forgot Your Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <button type="submit" class="btn btn-primary w-100">{{ __('Login') }}</button>
                                </div>

                                <div class="mb-3 text-center">
                                    <h5>
                                        Don't have an account ?
                                        <a href="{{ url('/register') }}" class="">{{ __('Register') }}</a> Now.
                                    </h5>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <div class="col-md-5">
                    <img src="{{ asset('assets/images/img-1.jpg') }}" class="w-100 shadow border" alt="Register" />
                </div>
            </div>
        </div>
    </div>

@endsection
