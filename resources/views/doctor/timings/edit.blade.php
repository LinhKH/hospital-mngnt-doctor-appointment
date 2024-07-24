@extends('layouts.doctor')

@section('title','Edit Timings')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Edit Timings
                    <a href="{{ url('doctor/timings') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success">{{session('status')}}</div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ url('doctor/timings/'.$doctorTiming->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        {{-- <div class="col-md-3">
                            <label for="days">Select a day</label>
                            <select name="day" id="days" disabled class="form-select">
                                <option value="">Select a day</option>
                                <option {{ $doctorTiming->day == "monday"?'selected':'' }} value="monday">Monday</option>
                                <option {{ $doctorTiming->day == "tuesday"?'selected':'' }} value="tuesday">Tuesday</option>
                                <option {{ $doctorTiming->day == "wednesday"?'selected':'' }} value="wednesday">Wednesday</option>
                                <option {{ $doctorTiming->day == "thursday"?'selected':'' }} value="thursday">Thursday</option>
                                <option {{ $doctorTiming->day == "friday"?'selected':'' }} value="friday">Friday</option>
                                <option {{ $doctorTiming->day == "saturday"?'selected':'' }} value="saturday">Saturday</option>
                                <option {{ $doctorTiming->day == "sunday"?'selected':'' }} value="sunday">Sunday</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="shift">Select a shift</label>
                            <select name="shift" id="shift" disabled class="form-select">
                                <option value="">Select a Shift</option>
                                <option value="shift_1" {{ $doctorTiming->shift == 'shift_1' ? 'selected':'' }}>Shift 1</option>
                                <option value="shift_2" {{ $doctorTiming->shift == 'shift_1' ? 'selected':'' }}>Shift 2</option>
                            </select>
                        </div> --}}
                        <hr>
                        <h5>Day: <span class="text-uppercase">{{ $doctorTiming->day }}</span></h5>
                        <h5>Shift: <span class="text-uppercase">{{ $doctorTiming->shift }}</span></h5>
                        <div class="col-md-3">
                            <label for="">Start Time</label>
                            <input type="text" id="time" value="{{ $doctorTiming->start_time }}" required name="start_time" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">End Time</label>
                            <input type="text" id="time" value="{{ $doctorTiming->end_time }}" required name="end_time" class="form-control">
                        </div>
                        <div class="col-md-3">
                            <label for="">Avg Consulatation time</label>
                            {{-- <input type="number" required placeholder="Ex: 60 (In minutes)" value="{{ $doctorTiming->avg_consultation_time }}" name="avg_consultation_time" class="form-control"> --}}
                            <select name="avg_consultation_time" class="form-control">
                                <option value="">Select Time</option>
                                <option value="10" {{ $doctorTiming->avg_consultation_time == 10 ? 'selected':'' }}>10 Minutes</option>
                                <option value="15" {{ $doctorTiming->avg_consultation_time == 15 ? 'selected':'' }}>15 Minutes</option>
                                <option value="20" {{ $doctorTiming->avg_consultation_time == 20 ? 'selected':'' }}>20 Minutes</option>
                                <option value="25" {{ $doctorTiming->avg_consultation_time == 25 ? 'selected':'' }}>25 Minutes</option>
                                <option value="30" {{ $doctorTiming->avg_consultation_time == 30 ? 'selected':'' }}>30 Minutes</option>
                                <option value="35" {{ $doctorTiming->avg_consultation_time == 35 ? 'selected':'' }}>35 Minutes</option>
                                <option value="40" {{ $doctorTiming->avg_consultation_time == 40 ? 'selected':'' }}>40 Minutes</option>
                                <option value="45" {{ $doctorTiming->avg_consultation_time == 45 ? 'selected':'' }}>45 Minutes</option>
                                <option value="50" {{ $doctorTiming->avg_consultation_time == 50 ? 'selected':'' }}>50 Minutes</option>
                                <option value="55" {{ $doctorTiming->avg_consultation_time == 55 ? 'selected':'' }}>55 Minutes</option>
                                <option value="60" {{ $doctorTiming->avg_consultation_time == 60 ? 'selected':'' }}>60 Minutes</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <br/>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>


                </form>

            </div>
        </div>
    </div>
</div>
@endsection
