@extends('layouts.doctor')

@section('title','Edit Patient')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Patient
                    <a href="{{ url('doctor/patients') }}" class="btn btn-sm btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('doctor/patients/'.$patient->id.'/edit') }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-6">
                            <label>Full Name</label>
                            <p class="form-control">{{ $patient->name }}</p>
                        </div>
                        <div class="col-md-6">
                            <label>Email Address</label>
                            <p class="form-control">{{ $patient->email }}</p>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Age</label>
                            <input type="text" name="age" class="form-control" value="{{ $patient->age }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-control">
                                <option value="">Select Gender</option>
                                <option value="Male" {{ $patient->gender == 'Male' ? 'selected':''}}>Male</option>
                                <option value="Female" {{ $patient->gender == 'Female' ? 'selected':''}}>Female</option>
                                <option value="Others" {{ $patient->gender == 'Others' ? 'selected':''}}>Others</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $patient->phone }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Date of Birth</label>
                            <input type="text" name="dob" class="form-control" value="{{ $patient->dob }}">
                        </div>
                        <div class="col-md-12 text-end mb-3">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
