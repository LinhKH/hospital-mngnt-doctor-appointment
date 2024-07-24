@extends('layouts.admin')

@section('title','Dashboard')

@section('content')

<div class="row">

    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/appointments') }}">
                        <span class="fw-semibold d-block mb-1">Today Appointments</span>
                        <h3 class="card-title mb-2">{{ $todayAppointment }}</h3>
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
                    <a href="{{ url('admin/appointments') }}">
                        <span class="fw-semibold d-block mb-1">All Completed Appoints </span>
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
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/appointments') }}">
                        <span class="fw-semibold d-block mb-1">Future Appointments </span>
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


    <hr>

    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/departments') }}">
                        <span class="fw-semibold d-block mb-1">Total Departments</span>
                        <h3 class="card-title mb-2">{{$totalDepartments}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-body fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/doctors') }}">
                        <span class="fw-semibold d-block mb-1">Total Doctors</span>
                        <h3 class="card-title mb-2">{{$totalDoctor}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-plus fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/manage-admins') }}">
                        <span class="fw-semibold d-block mb-1">Total Admins</span>
                        <h3 class="card-title mb-2">{{$totalAdmins}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-user-plus fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card p-3">
            <div class="row">
                <div class="col-md-9">
                    <a href="{{ url('admin/patients') }}">
                        <span class="fw-semibold d-block mb-1">Total Patients</span>
                        <h3 class="card-title mb-2">{{$totalPatients}}</h3>
                    </a>
                </div>
                <div class="col-md-3">
                    <h5 class="card-title text-primary">
                        <i class="bx bx-question-mark fs-3 p-1 float-esnd border rounded bg-light me-1"></i>
                    </h5>
                </div>
            </div>
        </div>
    </div>


</div>

@endsection
