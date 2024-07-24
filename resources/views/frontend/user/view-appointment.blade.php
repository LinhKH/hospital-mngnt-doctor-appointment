@extends('layouts.app')

@section('title', 'My Appointments')

@section('content')

    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Appointment
                                <a href="{{ url('/user/appointments') }}" class="btn btn-danger btn-sm float-end">
                                    Back
                                </a>
                            </h4>
                        </div>
                        <div class="card-body">

                            <div class="row">
                                <div class="col-md-8 mb-3">
                                    <h5 class="mb-1">Appointment No: {{ $appointment->appointment_number }}</h5>
                                    <h5 class="mb-1">Appointment Date:
                                        {{ date('d M, Y', strtotime($appointment->appointment_date)) }}</h5>
                                    <h5 class="mb-1">Appointment Time:
                                        {{ date('H:i A', strtotime($appointment->appointment_time)) }}</h5>

                                    <hr>

                                    <h5 class="mb-1">Doctor Name: {{ $appointment->doctor->name }}</h5>
                                    <h5 class="mb-1">Doctor Desgination: {{ $appointment->doctor->designation }}</h5>
                                    <hr>
                                    <h5 class="mb-1">Consulation Fees: {{ $appointment->consulation_fees }}</h5>
                                    <h5 class="mb-1">
                                        Consulation Fees Payment Status:
                                        @if ($appointment->consulation_fees_status == 'pending')
                                            <span class="badge bg-warning">Pending</span>
                                        @else
                                            <span class="badge bg-success">Paid</span>
                                        @endif
                                    </h5>

                                    <h5 class="mb-1">Doctor Comment: {{ $appointment->doctor_comment }}</h5>

                                    <hr>

                                    <h5 class="mb-1">Status:
                                        @if ($appointment->status == App\Enums\AppointmentStatusEnum::Booked)
                                            <span class="badge bg-primary">Booked</span>
                                        @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::Completed)
                                            <span class="badge bg-success">Completed</span>
                                        @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::Cancel)
                                            <span class="badge bg-danger">Cancelled</span>
                                        @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::NotAvailable)
                                            <span class="badge bg-info">Patient Not Available</span>
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-md-4">
                                    @if ($appointment->doctor->image)
                                        <img src="{{ asset($appointment->doctor->image) }}" class="w-100 shadow rounded-4"
                                        alt="{{ $appointment->doctor->name }}" />
                                    @else
                                        <img src="{{ asset('assets/images/img-1.jpg') }}" class="w-100 shadow rounded-4"
                                            alt="User" />
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
