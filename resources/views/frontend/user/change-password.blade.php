@extends('layouts.app')

@section('title','Change Password')

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
                        <h4>Change Your Password</h4>
                    </div>
                    <div class="card-body">

                        @if (session('status'))
                            <div class="alert alert-success mb-3">{{ session('status') }}</div>
                        @endif

                        <form action="{{ url('/user/change-password') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label>Current Password *</label>
                                <input type="text" name="current_password" class="form-control" />
                                @error('current_password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="mb-3">
                                <label>New Password *</label>
                                <input type="text" name="password" class="form-control" />
                                @error('password')<span class="text-danger">{{$message}}</span>@enderror
                            </div>
                            <div class="mb-3">
                                <label>Confirm Password *</label>
                                <input type="text" name="password_confirmation" class="form-control" />
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">Update Password</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
