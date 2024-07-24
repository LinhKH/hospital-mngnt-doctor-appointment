@extends('layouts.doctor')

@section('title','Doctor Timings')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4> Doctor Timings</h4>
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
                <form action="{{ url('doctor/timings') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-2">
                            <label for="days">Select a day</label>
                            <select name="day" id="days"  class="form-select">
                                <option value="">Select a day</option>
                                <option value="monday" {{ old('day') == 'monday' ? 'selected' : '' }}>Monday</option>
                                <option value="tuesday" {{ old('day') == 'tuesday' ? 'selected' : '' }}>Tuesday</option>
                                <option value="wednesday" {{ old('day') == 'wednesday' ? 'selected' : '' }}>Wednesday</option>
                                <option value="thursday" {{ old('day') == 'thursday' ? 'selected' : '' }}>Thursday</option>
                                <option value="friday" {{ old('day') == 'friday' ? 'selected' : '' }}>Friday</option>
                                <option value="saturday" {{ old('day') == 'saturday' ? 'selected' : '' }}>Saturday</option>
                                <option value="sunday" {{ old('day') == 'sunday' ? 'selected' : '' }}>Sunday</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="shift">Select a shift</label>
                            <select name="shift" id="shift"  class="form-select">
                                <option value="">Select a Shift</option>
                                <option value="shift_1" {{ old('shift') == 'shift_1' ? 'selected' : '' }}>Shift 1</option>
                                <option value="shift_2" {{ old('shift') == 'shift_2' ? 'selected' : '' }}>Shift 2</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <label for="">Start Time</label>
                            <input type="text" id="time"  name="start_time" value="{{ old('start_time') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">End Time</label>
                            <input type="text" id="time"  name="end_time" value="{{ old('end_time') }}" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label for="">Avg Consulatation time</label>
                            <select name="avg_consultation_time" class="form-control">
                                <option value="">Select Time</option>
                                <option value="10" {{ old('avg_consultation_time') == '10' ? 'selected' : '' }}>10 Minutes</option>
                                <option value="15" {{ old('avg_consultation_time') == '15' ? 'selected' : '' }}>15 Minutes</option>
                                <option value="20" {{ old('avg_consultation_time') == '20' ? 'selected' : '' }}>20 Minutes</option>
                                <option value="25" {{ old('avg_consultation_time') == '25' ? 'selected' : '' }}>25 Minutes</option>
                                <option value="30" {{ old('avg_consultation_time') == '30' ? 'selected' : '' }}>30 Minutes</option>
                                <option value="35" {{ old('avg_consultation_time') == '35' ? 'selected' : '' }}>35 Minutes</option>
                                <option value="40" {{ old('avg_consultation_time') == '40' ? 'selected' : '' }}>40 Minutes</option>
                                <option value="45" {{ old('avg_consultation_time') == '45' ? 'selected' : '' }}>45 Minutes</option>
                                <option value="50" {{ old('avg_consultation_time') == '50' ? 'selected' : '' }}>50 Minutes</option>
                                <option value="55" {{ old('avg_consultation_time') == '55' ? 'selected' : '' }}>55 Minutes</option>
                                <option value="60" {{ old('avg_consultation_time') == '60' ? 'selected' : '' }}>60 Minutes</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <div class="text-end">
                                <br/>
                                <button type="submit" class="btn btn-primary w-100">Add</button>
                            </div>
                        </div>
                    </div>
                </form>
                <hr>

                <div class="table-responsive">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Days</th>
                                <th>Shifts</th>
                                <th>Start Time</th>
                                <th>End Time</th>
                                <th>Avg Consultation Time (In Mins)</th>
                                <th>Action</th>
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
                                    <td>
                                        <a href="{{ url('doctor/timings/'.$item->id.'/edit') }}" class="btn btn-success">Edit</a>
                                        <a href="{{ url('doctor/timings/'.$item->id.'/delete') }}" class="btn btn-danger">Delete</a>
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
