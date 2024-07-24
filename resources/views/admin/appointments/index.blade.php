@extends('layouts.admin')

@section('title','Appointments')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Appointments</h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-7 mb-4">
                        <h5 class="mb-1">Select type and date to get the appointments lists</h5>
                        <form action="" method="GET">
                            <div class="input-group">
                                <select name="type" class="form-select" required>
                                    <option value="">Select Appointment Date Type</option>
                                    <option value="aptdate" {{ Request::get('type') == 'aptdate' ? 'selected':'' }}>Appointment Date</option>
                                    <option value="aptcrtdt" {{ Request::get('type') == 'aptcrtdt' ? 'selected':'' }}>Appointment Created Date</option>
                                </select>
                                <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control" />
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ url('admin/appointments') }}" class="btn btn-danger">Reset</a>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="table-responsive">
                    <table id="myDataTable" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Apt. No.</th>
                                <th>Apt. Date</th>
                                <th>Patient Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($appointments as $appointment)
                            <tr>
                                <td>{{ $appointment->appointment_number }}</td>
                                <td>{{ date('d M, Y', strtotime($appointment->appointment_date)) }}</td>
                                <td>{{ $appointment->name }}</td>
                                <td>{{ $appointment->email }}</td>
                                <td>{{ $appointment->phone ?? 'X' }}</td>
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
                                    <a class="btn btn-info btn-sm" href="{{ url('admin/appointments/'.$appointment->appointment_number.'/show') }}">
                                        <i class="bx bx-pencil me-1"></i> View
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
@endsection
