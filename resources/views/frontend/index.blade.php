@extends('layouts.app')

@section('title', 'Doctor Appiontment System')

@section('content')

    @include('frontend.partials.sliders')

    <div class="py-4 bg-l-blue">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-3 text-center border-md-end">
                    <div class="box1">
                        <h4><i class="bx bx-phone"></i> Call Us</h4>
                        @if ($appSetting)
                            @if ($appSetting->phone1)
                                <p>{{ $appSetting->phone1 }}</p>
                            @else
                                <p>+91 888 XXX XXXX</p>
                            @endif
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3 text-center border-md-end">
                    <div class="box1">
                        <h4><i class="bx bx-plus-medical"></i> Emergency Care</h4>
                        @if ($appSetting && $appSetting->phone2)
                            <p>{{ $appSetting->phone2 }}</p>
                        @else
                            <p>080 2222 XXXX</p>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 mb-3 text-center">
                    <div class="box1">
                        <h4><i class="bx bx-envelope"></i> Email Us</h4>
                        @if ($appSetting && $appSetting->email1)
                            <p>{{ $appSetting->email1 }}</p>
                        @else
                            <p>vedprakash151994@gmail.com</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <h4 class="main-heading">About Us</h4>
                    <div class="underline"></div>
                    <h4 class="elementor-heading-title elementor-size-default">HotDoc is Australia's largest and most
                        trusted patient engagement platform with over 21,000 listed doctors and 8 million active patients
                    </h4>
                    <div class="elementor-widget-container">
                        <p><span style="font-weight: 400;">Nearly 1 in 3 Australians use HotDoc to connect with their
                                preferred doctor. Patients use the platform to book online and better manage their (and
                                their family’s) health. </span><span style="font-weight: 400;">While practices and
                                practitioners use </span><span style="font-weight: 400;">HotDoc as an all-in-one solution to
                                connect with new and existing patients.</span></p>
                        <p><span style="font-weight: 400;">At our core, our mission is to improve the health care experience
                                for everyone in Australia. We do this by giving clinics access to online bookings,
                                telehealth, appointment reminders, SMS recalls for clinical reminders and results, mobile
                                and kiosk check-in, digital new patient registration forms, online prescription renewals,
                                and tools for encouraging preventative health.</span></p>
                    </div>
                    <a href="{{ url('about-us') }}" class="btn btn-1">Read More</a>
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('assets/images/doctor.jpg') }}" class="w-100 shadow-sm" alt="About Us" />
                </div>
            </div>
        </div>
    </div>


@endsection
