@extends('layouts.doctor')

@section('title','Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('doctor/patients') }}">
                        <span class="fw-semibold d-block mb-1">Total Patients</span>
                        <h3 class="card-title mb-2">{{$totalPatients}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-list-ol fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('doctor/appointments') }}">
                        <span class="fw-semibold d-block mb-1">Today Appointments</span>
                        <h3 class="card-title mb-2">{{$todayAppointment}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-list-ol fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('doctor/appointments') }}">
                        <span class="fw-semibold d-block mb-1">Future Appointments</span>
                        <h3 class="card-title mb-2">{{$futureAppointment}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-list-ol fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('doctor/appointments') }}">
                        <span class="fw-semibold d-block mb-1">Completed Appointment</span>
                        <h3 class="card-title mb-2">{{$completedAppointment}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-list-ol fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>

    <hr>

</div>

@endsection
