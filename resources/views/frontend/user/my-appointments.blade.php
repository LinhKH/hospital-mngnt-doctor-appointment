@extends('layouts.app')

@section('title','My Appointments')

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
                        <h4 class="mb-0">My Appointments</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myDataTable" class="table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Apt. No.</th>
                                        <th>Apt. Date</th>
                                        <th>Apt. Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="table-border-bottom-0">
                                    @foreach ($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->appointment_number }}</td>
                                        <td>{{ date('d M, Y', strtotime($appointment->appointment_date)) }}</td>
                                        <td>{{ date('H:i A', strtotime($appointment->appointment_time)) }}</td>
                                        <td>
                                            @if ($appointment->status == App\Enums\AppointmentStatusEnum::Booked)
                                                <span class="badge bg-primary">Booked</span>
                                            @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::Completed)
                                                <span class="badge bg-success">Completed</span>
                                            @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::Cancel)
                                                <span class="badge bg-danger">Cancelled</span>
                                            @elseif ($appointment->status == App\Enums\AppointmentStatusEnum::NotAvailable)
                                                <span class="badge bg-info">Patient Not Available</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a class="btn btn-info btn-sm" href="{{ url('user/appointments/'.$appointment->appointment_number.'/show') }}">
                                                <i class="bx bx-show me-1"></i> View
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
