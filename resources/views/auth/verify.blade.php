@extends('layouts.header')

@section('content')
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.8.95/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">

    <style>
        @import url("https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&family=Heebo:wght@300;400;500;600;700&display=swap");

        html {
            height: 100%;
        }

        body {
            background-color: #d0d0ce;
            background-image: #dfe1e0;
            background-repeat: no-repeat;
            background-position: center;
            background-size: cover;
            min-height: 100%;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        .h1,
        .h2,
        .h3,
        .h4,
        .h5,
        .h6 {
            font-family            : "Heebo", sans-serif;;
            font-weight            : 450;
            color                  : #161616;
            font-variant-ligatures : common-ligatures;
            text-rendering         : optimizeLegibility;
        }

        /* ==========================================================================
       #CARD
       ========================================================================== */
        .row {
            display: -webkit-box;
            display: -webkit-flex;
            display: -moz-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-flex-wrap: wrap;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
        }
        .card {
            background: #fff;
            border-radius: 25px;
            overflow: hidden;
            -webkit-border-radius: 3px;
            -moz-border-radius: 3px;
            border: 0;
            width: 100%;
            height: 100%;
        }

        .card-2 {
            -webkit-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -moz-box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            box-shadow: 0px 8px 20px 0px rgba(0, 0, 0, 0.15);
            -webkit-border-radius: 10px;
            -moz-border-radius: 10px;
            border-radius: 10px;
            width: 100%;
            height: 100%;
            display: table;
        }

        .card-2 .card-heading {
            background: url("../img/feedback.png");
            border-radius: 0;
            width: 32%;
            height: 100%;
            -o-object-fit: cover;
            object-fit: cover;
            overflow: auto;
            display: table-cell;
            vertical-align: middle;
        }

        .card-heading img{
            width: 100px;
            height: 100px;
            margin: 0 auto;
            display:block;
        }

        .card-2 .card-body {
            display: table-cell;
            padding: 40px;
        }

        .container{
            padding-top: 20px;
        }

        @media (max-width: 767px) {
            .card-2 {
                display: block;
            }
            .card-2 .card-heading {
                display: none;
            }
            .card-2 .card-body {
                display: block;
                padding: 60px 50px;
            }
        }
    </style>
    <!-- Favicon -->
    @include('nav.favicon')
    <!-- Favicon -->
    <!-- navbar
    ================================================== -->
    @include('nav.navbar')
    <!-- navbar
================================================== -->
    </head>
    <body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Remember to Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif
                    {{ __('Please check your email for a verification link.') }}
                    {{ __('If you did not receive the email,') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
<script src="{{ URL::asset('js/nav.js') }}"></script>
    </body>
@endsection
