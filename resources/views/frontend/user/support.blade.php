@extends('layouts.app')

@section('title','My Profile')

@section('content')

<div class="section">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('frontend.user.sidebar')
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0"> <i class="text-logo bx bx-phone-call"></i> Support</h4>
                    </div>
                    <div class="card-body">
                        <br/>
                        @if ($appSetting && $appSetting->email1)
                        <h5> <i class="text-logo me-2 bx bx-envelope"></i> Email : {{$appSetting->email1}}</h5>
                        <hr>
                        @endif

                        @if ($appSetting && $appSetting->email2)
                        <h5> <i class="text-logo me-2 bx bx-envelope"></i> Email : {{$appSetting->email2}}</h5>
                        <hr>
                        @endif

                        @if ($appSetting && $appSetting->phone1)
                        <h5> <i class="text-logo me-2 bx bx-phone-call"></i> Phone : {{$appSetting->phone1}}</h5>
                        <hr>
                        @endif

                        @if ($appSetting && $appSetting->phone2)
                        <h5> <i class="text-logo me-2 bx bx-phone-call"></i> Phone : {{$appSetting->phone2}}</h5>
                        <hr>
                        @endif

                        @if ($appSetting && $appSetting->website_link)
                        <h5> <i class="text-logo me-2 bx bx-globe"></i> Website : {{$appSetting->website_link}}</h5>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
