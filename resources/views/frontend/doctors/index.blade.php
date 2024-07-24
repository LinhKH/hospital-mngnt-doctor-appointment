@extends('layouts.app')

@section('title','Find A Doctor')

@section('content')

    <div class="banner-area">
        <div class="banner-overlay">
            <div class="container">
                <div class="row">
                    <div class="col-md-7 text-md-start text-center">
                        <h4 class="banner-heading">Find A Doctor</h4>
                        <div class="banner-link">
                            <a href="/"> Home </a> /
                            <a href="javascript:void(0)" class="active"> Find A Doctor </a>
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

            <div class="row justify-content-center tsext-center">
                <div class="col-md-10 mb-5">
                    <form action="" method="GET">
                        <label class="mb-1">Search Doctor's</label>
                        <div class="input-group mb-3">
                            {{-- <select name="" class="select2-box custom-form-control custom-select">
                                <option value="">All</option>
                                <option value="">Doctor 1</option>
                                <option value="">Doctor 2</option>
                            </select> --}}
                            <input type="text" name="doctor" value="{{ Request::get('doctor') ?? '' }}" class="form-control custom-form-control" placeholder="Search Doctor" />
                            <button type="submit" class="btn btn-primary px-4" id="basic-addon2">Search</button>
                            <a href="{{ url(URL::current()) }}" class="btn btn-danger px-4">Reset</a>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">

                @forelse ($doctors as $doctor)
                <div class="col-md-6 mb-3">
                    <div class="doctor-box">
                        <div class="row">
                            <div class="col-md-4 my-auto">
                                @if ($doctor->image)
                                    <img src="{{ asset($doctor->image) }}" class="w-100" alt="Department Image" />
                                @else
                                    <img src="{{ asset('assets/images/no-img.jpg') }}" class="w-100" alt="Department Image" />
                                @endif
                            </div>
                            <div class="col-md-8">
                                <h4 class="doctor-name">{{$doctor->name}}</h4>
                                <h6 class="doctor-designation">{{$doctor->designation}}</h6>

                                <hr>

                                <h5 class="doctor-heading">Qualifications:</h5>
                                <p class="qualification-set">
                                   {!! $doctor->qualification !!}
                                </p>

                                <a href="{{ url('find-a-doctor/'.$doctor->slug) }}" class="btn btn-1">Read More</a>
                                <a href="{{ url('book-appointment/'.$doctor->slug) }}" class="btn btn-1">Book Appointment</a>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                    <div class="col-md-12">
                        <h4 class="main-heading">Doctor's Not Available</h4>
                    </div>
                @endforelse

            </div>
        </div>
    </div>

@endsection
