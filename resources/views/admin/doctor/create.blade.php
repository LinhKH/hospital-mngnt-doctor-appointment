@extends('layouts.admin')

@section('title','Add Doctor')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Doctor
                    <a href="{{ url('/admin/doctors') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('/admin/doctors/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Select Department *</label>
                            <select name="department_id" required class="form-select">
                                <option value="">Select Department</option>
                                @forelse ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->name }}</option>
                                @empty
                                <option value="">No Departments Added</option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Doctor Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control" />
                            @error('name')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone Number *</label>
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" />
                            @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email *</label>
                            <input type="text" name="email" value="{{ old('email') }}" class="form-control" />
                            @error('email')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Password *</label>
                            <input type="text" name="password" value="{{ old('password') }}" class="form-control" />
                            @error('password')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gender *</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Designation *</label>
                            <input type="text" name="designation" value="{{ old('designation') }}" class="form-control" />
                            @error('designation')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Qualification</label>
                            <input type="text" name="qualification" value="{{ old('qualification') }}" class="form-control" />
                            @error('qualification')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Experience</label>
                            <input type="text" name="experience" value="{{ old('experience') }}" class="form-control" />
                            @error('experience')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Specialization (Max 1000 characters)</label>
                            <textarea name="specialization" class="form-control" rows="3">{{ old('specialization') }}</textarea>
                            @error('specialization')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bio (Max 1000 characters)</label>
                            <textarea name="bio" class="form-control" rows="3">{{ old('bio') }}</textarea>
                            @error('bio')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Consulation Fees</label>
                            <input type="text" name="consulation_fees" value="{{ old('consulation_fees') }}" class="form-control" />
                            @error('consulation_fees')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Upload Doctor Image</label>
                            <input type="file" name="image" class="form-control" />
                            @error('image')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address (Max 500 characters)</label>
                            <textarea name="address" class="form-control" rows="3">{{ old('address') }}</textarea>
                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="is_active" checked style="width: 25px; height: 25px;" /> Is Active
                        </div>
                        <div class="col-md-6 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
