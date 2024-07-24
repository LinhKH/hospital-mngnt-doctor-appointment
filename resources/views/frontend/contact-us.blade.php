@extends('layouts.app')

@section('title','Contact Us')

@section('content')

    <div class="banner-area">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-md-start text-center">
                        <h4 class="banner-heading">Contact Us</h4>
                        <div class="banner-link">
                            <a href="/"> Home </a> /
                            <a href="javascript:void(0)" class="active"> Contact Us </a>
                        </div>
                    </div>
                    <div class="col-md-5 text-md-end text-center">
                        @if ($appSetting && $appSetting->phone1)
                        <a href="tel:{{$appSetting->phone1}}" class="btn3"><h5 class="mb-0 fs-4"> Call Us: {{$appSetting->phone1}}</h5></a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="heading">Contact Information</h4>
                    <div class="underline"></div>
                    <p>
                        Get in touch with
                        @if ($appSetting && $appSetting->website_name)
                            {{$appSetting->website_name}}
                        @endif
                    </p>

                    <hr>

                    @if ($appSetting && $appSetting->email1)
                    <h5> <i class="bx bx-envelope"></i> Email: {{ $appSetting->email1 }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->email2)
                    <h5> <i class="bx bx-envelope"></i> Email: {{ $appSetting->email2 }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->phone1)
                    <h5> <i class="bx bx-phone"></i> Phone: {{ $appSetting->phone1 }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->phone2)
                    <h5> <i class="bx bx-phone"></i> Phone 2: {{ $appSetting->phone2 }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->whatsapp)
                    <h5> <i class="bx bxl-whatsapp"></i> Whatsapp: {{ $appSetting->whatsapp }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->fax)
                    <h5> <i class="bx bx-envelope"></i> Fax: {{ $appSetting->fax }}</h5>
                    <hr>
                    @endif
                    @if ($appSetting && $appSetting->website_name)
                    <h5> <i class="bx bx-globe"></i> Website: {{ $appSetting->website_link }}</h5>
                    <hr>
                    @endif
                </div>
                <div class="col-md-6">
                    <img src="{{ asset('assets/images/img-1.jpg') }}" class="w-100 shadow-sm" alt="About Us" />
                </div>
            </div>
        </div>
    </div>

@endsection
