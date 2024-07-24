@extends('layouts.admin')

@section('title','Doctor Timings')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Doctor Timings
                    <a href="{{ url('/admin/doctors') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <h4>{{ $doctor->name }}'s  Timings </h4>
                <hr/>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Days</th>
                            <th>Shifts</th>
                            <th>Start Time</th>
                            <th>End Time</th>
                            <th>Avg Consultation Time (In Mins)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctorTimings as $item)
                            <tr>
                                <td class="text-capitalize">{{ $item->day }}</td>
                                <td class="text-capitalize">{{ $item->shift }}</td>
                                <td>{{ $item->start_time }}</td>
                                <td>{{ $item->end_time }}</td>
                                <td>{{ $item->avg_consultation_time }} Minutes</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
