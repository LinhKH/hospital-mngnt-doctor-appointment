@extends('layouts.admin')

@section('title','Admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Admin
                    <a href="{{ url('admin/manage-admins') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('/admin/manage-admins/create') }}" method="POST">
                    @csrf

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" />
                            @error('name') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone</label>
                            <input type="text" name="phone" class="form-control" />
                            @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" />
                            @error('email') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Password</label>
                            <input type="text" name="password" class="form-control" />
                            @error('password') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Gender</label>
                            <select name="gender" class="form-select">
                                <option value="">Select Gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Ban / Active</label>
                            <br/>
                            <input type="checkbox" name="is_ban" style="width:30px;height:30px;" />
                            Checked = banned, UnChecked = Active
                        </div>
                        <div class="col-md-12 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection
