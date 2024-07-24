@extends('layouts.admin')

@section('title','Edit Doctor')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Doctor
                    <a href="{{ url('/admin/doctors') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('/admin/doctors/'.$doctor->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="row">
                        <div class="col-md-9">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label>Select Department *</label>
                                    <select name="department_id" required class="form-select">
                                        <option value="">Select Department</option>
                                        @forelse ($departments as $department)
                                        <option value="{{ $department->id }}" {{ $department->id == $doctor->department_id ? 'selected':'' }}>
                                            {{ $department->name }}
                                        </option>
                                        @empty
                                        <option value="">No Departments Added</option>
                                        @endforelse
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Doctor Name *</label>
                                    <input type="text" name="name" value="{{ $doctor->name }}" class="form-control" />
                                    @error('name')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Phone Number *</label>
                                    <input type="text" name="phone" value="{{ $doctor->phone }}" class="form-control" />
                                    @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Email </label>
                                    <input type="text" name="email" readonly value="{{ $doctor->user->email ?? '' }}" class="form-control" />
                                    @error('email')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Password </label>
                                    <input type="text" name="password" class="form-control" />
                                    @error('password')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Gender *</label>
                                    <select name="gender" class="form-select">
                                        <option value="">Select Gender</option>
                                        <option value="Male" {{ $doctor->gender == 'Male' ? 'selected':'' }}>Male</option>
                                        <option value="Female" {{ $doctor->gender == 'Female' ? 'selected':'' }}>Female</option>
                                    </select>
                                    @error('phone')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label>Designation *</label>
                                    <input type="text" name="designation" value="{{ $doctor->designation }}" class="form-control" />
                                    @error('designation')<span class="text-danger">{{$message}}</span>@enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="border p-2 mb-3">
                                @if ($doctor->image)
                                    <img src="{{ asset($doctor->image) }}" class="w-100" style="height: 199px;" alt="Doctor Profile" />
                                @else
                                    <img src="{{ asset('assets/images/no-img.jpg') }}" class="w-100" style="height: 199px;" alt="Doctor Profile" />
                                @endif
                            </div>
                            <div class="col-smd-6 mb-3">
                                <label>Upload Doctor Image</label>
                                <input type="file" name="image" class="form-control" />
                                @error('image')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Qualification</label>
                            <input type="text" name="qualification" value="{{ $doctor->qualification }}" class="form-control" />
                            @error('qualification')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Experience</label>
                            <input type="text" name="experience" value="{{ $doctor->experience }}" class="form-control" />
                            @error('experience')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Specialization (Max 1000 characters)</label>
                            <textarea name="specialization" class="form-control" rows="3">{{ $doctor->specialization }}</textarea>
                            @error('specialization')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Bio (Max 1000 characters)</label>
                            <textarea name="bio" class="form-control" rows="3">{{ $doctor->bio }}</textarea>
                            @error('bio')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Address (Max 500 characters)</label>
                            <textarea name="address" class="form-control" rows="3">{{ $doctor->address }}</textarea>
                            @error('address')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-12">
                            <hr/>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Consulation Fees</label>
                            <input type="text" name="consulation_fees" value="{{ $doctor->consulation_fees }}" class="form-control" />
                            @error('consulation_fees')<span class="text-danger">{{$message}}</span>@enderror
                        </div>
                        <div class="col-md-3 mb-3">
                            <br/>
                            <input type="checkbox" name="is_active" {{ $doctor->is_active == 1 ? 'checked':'' }} style="width: 25px; height: 25px;" /> Is Active
                        </div>
                        <div class="col-md-3 mb-3">
                            <br/>
                            <input type="checkbox" name="is_ban" style="width: 25px; height: 25px;" /> Is Ban
                        </div>
                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
