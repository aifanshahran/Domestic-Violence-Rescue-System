@extends('layouts.header')

@section('content')
    <script src="https://kit.fontawesome.com/9dc0cd5b8c.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('css/login.css')}}">
    <!-- Favicon -->
    @include('nav.favicon')
    <!-- Favicon -->
    </head>
    <body>
    <!-- EXIT BUTTON -->
    @include('nav.exit')
    <!-- EXIT BUTTON -->
    <main class="d-flex align-items-center min-vh-100 py-3 py-md-0">
        <div class="container">
            <div class="card login-card">
                <div class="row no-gutters">
                    <div class="col-md-6">
                        <picture>
                            <source srcset="{{ URL::asset('img/login-card.avif') }}" type="image/avif">
                            <source srcset="{{ URL::asset('img/login-card.webp') }}" type="image/webp">
                            <img src="{{ URL::asset('img/login-card.png') }}" alt="dvrs-login-card" class="login-card-img">
                        </picture>
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <a href="{{ url('/') }}" type="button" class="close">×</a>
                            <div class="brand-wrapper">
                                @include('layouts.logo')
                            </div>
                            @if (session('message'))
                                <div class="alert alert-danger col-md-9" role="alert">
                                    <button type="button" class="close" data-dismiss="alert">×</button>
                                    {{ session('message') }}
                                </div>
                            @endif
                            <h3>Sign into your account</h3>
                            <form method="POST" action="{{ route('login-otp') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text form-control" id="basic-addon1">+60</span>
                                        </div>
                                        <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" placeholder="Phone Number" value="{{ old('phone') }}">
                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="input-group mb-3">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember Me') }}
                                            </label>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <a type="button" class="btn btn-block button--loading login-btn mb-4" data-toggle="modal" data-target="#security">
                                            {{ __('Login with phone number') }}
                                        </a>
                                    </div>
                                    <div class="modal fade" id="security" tabindex="-1" role="dialog" aria-labelledby="OTP" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    @include('layouts.logo')
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body text-justify">
                                                    <h3>{!! __('alert.alert_title') !!}</h3>
                                                    <p>{!! __('alert.sms_monitored', [ 'url' => 'tel:15999' ]) !!}</p>
                                                    <p>{!! __('alert.send_message') !!}</p>
                                                    <p><b>{!! __('alert.close') !!}</b></p>
                                                    <div class="mt-4"><button type="submit" class="btn btn-danger btn-lg float-right">OKAY</button></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                            <p class="login-card-footer-text">
                                <a href="{{route('login')}}" class="text-reset">Login with Email</a></br>
                                Don't have an account?<a href="{{ route('register') }}" class="text-reset"> Register here</a>
                                @if (Route::has('password.request'))
                                    </br>
                                <a href="{{ route('password.request') }}" class="text-reset">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </p>
                            <nav class="login-card-footer-nav">
                                <a href="#!">Terms of use.</a>
                                <a href="#!">Privacy policy</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    </body>
@endsection

