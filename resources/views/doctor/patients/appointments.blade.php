@extends('layouts.doctor')

@section('title','Patients Appointment List')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Patients Appointment List
                    <a href="{{ url('doctor/patients') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @foreach ($userPatientAppointmentsLists as $key => $item)
                <div class="border shadow-sm p-3 mb-4">
                    <div class="row">
                        <div class="col-md-12">
                            <h5 class="fw-bold text-dark">{{ $key+1 }}. When this Appointment was created: {{$item->created_at->format('d-M-Y')}}</h5>
                            <hr>
                        </div>
                        <div class="col-md-5">
                            <h6 class="mb-2">Appointment No. : {{$item->appointment_number}}</h6>
                            <h6 class="mb-2">Appointment Date : {{$item->appointment_date}}</h6>
                            <h6 class="mb-2">Appointment Time : {{ date('H:i A', strtotime($item->appointment_time)) }}</h6>
                            <h6 class="mb-2">Consulation Fees : {{$item->consulation_fees}}</h6>
                            <h6 class="mb-2">Consulation Fees Status : {{$item->consulation_fees_status}}</h6>
                            <h6 class="mb-2">Appointment Status : {{$item->status}}</h6>
                        </div>
                        <div class="col-md-7">
                            <h6 class="mb-2">Patient Name : {{$item->name}}</h6>
                            <h6 class="mb-2">Patient Email : {{$item->email}}</h6>
                            <h6 class="mb-2">Patient Phone No. : {{$item->phone}}</h6>
                            <h6 class="mb-2">Patient Age : {{$item->user->age ?? ''}}</h6>
                            <h6 class="mb-2">Patient Comment : {{$item->user_comment }}</h6>
                            <h6 class="mb-2">Doctor Comment : {{$item->doctor_comment }}</h6>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
