@extends('layouts.app')

@section('title','My Profile')

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
                        <h4 class="mb-0">My Profile</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/user/profile') }}" method="POST">
                            @csrf

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label>Name</label>
                                    <input type="text" name="name" required class="form-control" value="{{ Auth::user()->name }}" />
                                    @error('name') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email</label>
                                    <input type="text" readonly class="form-control" value="{{ Auth::user()->email }}" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number *</label>
                                    <input type="text" name="phone" required class="form-control" value="{{ Auth::user()->phone }}" />
                                    @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Age</label>
                                    <input type="number" name="age" class="form-control" value="{{ Auth::user()->age }}" />
                                    @error('age') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Date of Birth</label>
                                    <input type="text" name="dob" class="form-control" value="{{ Auth::user()->dob }}" />
                                    @error('dob') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Gender *</label>
                                    <select name="gender" required class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ Auth::user()->gender == 'Male' ? 'selected':'' }}>Male</option>
                                        <option value="Female" {{ Auth::user()->gender == 'Female' ? 'selected':'' }}>Fe-Male</option>
                                    </select>
                                    @error('gender') <span class="text-danger">{{ $message }}</span> @enderror
                                </div>
                                <div class="col-md-12 text-end">
                                    <button type="submit" class="btn btn-primary px-5">Submit</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
