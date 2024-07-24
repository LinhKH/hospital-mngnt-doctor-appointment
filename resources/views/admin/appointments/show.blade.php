@extends('layouts.admin')

@section('title','View Appointment')

@section('content')

<div class="row">
    <div class="col-md-12">

        <div class="card">
            <div class="card-header">
                <h4>View Appointment
                    <a href="{{ url('admin/appointments') }}" class="btn btn-sm btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                <h4>Appointment Details</h4>
                <div class="row">
                    <div class="col-md-4">
                        <label>Appointment Number</label>
                        <p class="form-control">{{ $appointment->appointment_number }}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Appointment Date</label>
                        <p class="form-control">{{ date('F d, Y', strtotime($appointment->appointment_date)) }}</p>
                    </div>
                    <div class="col-md-4">
                        <label>Appointment Time</label>
                        <p class="form-control">{{ date('H:i A', strtotime($appointment->appointment_time)) }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h4>Patient Detail </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label>Full Name</label>
                        <input type="text" name="name" readonly class="form-control" value="{{ $appointment->name }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Email Address</label>
                        <input type="text" readonly class="form-control" value="{{ $appointment->email }}" readonly>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Alternate Phone Number</label>
                        <input type="text" readonly class="form-control" value="{{ $appointment->phone }}" readonly>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label>Age</label>
                        <input type="text" name="age" readonly class="form-control" value="{{ $appointment->user->age }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Gender</label>
                        <select name="gender" disabled class="form-select">
                            <option value="">Select Gender</option>
                            <option value="Male" {{ $appointment->user->gender == 'Male' ? 'selected':''}}>Male</option>
                            <option value="Female" {{ $appointment->user->gender == 'Female' ? 'selected':''}}>Female</option>
                            <option value="Others" {{ $appointment->user->gender == 'Others' ? 'selected':''}}>Others</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Phone</label>
                        <input type="text" class="form-control" readonly value="{{ $appointment->user->phone }}" />
                    </div>
                    <div class="col-md-4 mb-3">
                        <label>Date of Birth</label>
                        <input type="text" name="dob" readonly class="form-control" value="{{ $appointment->user->dob }}">
                    </div>
                    <div class="col-md-8">
                        <label>Patient/User Comment</label>
                        <p class="border rounded p-2">{{ $appointment->user_comment }}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-3">
            <div class="card-header">
                <h4>Appointment Status Update</h4>
            </div>
            <div class="card-body">




                    <div class="row">

                        <div class="col-md-12 mb-3">
                            <label>Appoitment Status</label>
                            <select name="status" class="form-select" disabled>
                                <option value="">Select Appointment Status</option>
                                <option
                                    value="{{ App\Enums\AppointmentStatusEnum::Booked }}"
                                    {{ $appointment->status == App\Enums\AppointmentStatusEnum::Booked ? 'selected':''}}>Booked
                                </option>
                                <option
                                    value="{{ App\Enums\AppointmentStatusEnum::Cancel }}"
                                    {{ $appointment->status == App\Enums\AppointmentStatusEnum::Cancel ? 'selected':''}}>Cancelled
                                </option>
                                <option
                                    value="{{ App\Enums\AppointmentStatusEnum::Completed }}"
                                    {{ $appointment->status == App\Enums\AppointmentStatusEnum::Completed ? 'selected':''}}>Completed
                                </option>
                                <option
                                    value="{{ App\Enums\AppointmentStatusEnum::NotAvailable }}"
                                    {{ $appointment->status == App\Enums\AppointmentStatusEnum::NotAvailable ? 'selected':''}}>Patient Not Avaiable
                                </option>
                            </select>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label>Consultation Fees </label>
                            <input type="text" name="consulation_fees" readonly class="form-control" value="{{ $appointment->consulation_fees }}" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label>Consultation Fees Status (Payment received?)</label>
                            <select name="consulation_fees_status" class="form-select" disabled>
                                <option value="pending" {{ $appointment->consulation_fees_status == 'pending' ? 'selected':'' }}>Pending</option>
                                <option value="completed" {{ $appointment->consulation_fees_status == 'completed' ? 'selected':'' }}>Completed</option>
                            </select>
                        </div>

                        <div class="col-md-12 mb-3">
                            <label>Doctor Comment (Write your comment)</label>
                            <textarea name="doctor_comment" class="form-control" readonly placeholder="Write comment..." rows="3">{{ $appointment->doctor_comment }}</textarea>
                        </div>

                    </div>

            </div>
        </div>

    </div>
</div>
@endsection
