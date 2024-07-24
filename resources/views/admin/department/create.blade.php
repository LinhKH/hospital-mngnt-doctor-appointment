@extends('layouts.admin')

@section('title','Add Department')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Add Department
                    <a href="{{ url('/admin/departments') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('/admin/departments/create') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label>Department Name *</label>
                        <input type="text" name="name" class="form-control" />
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote" rows="4"></textarea>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <input type="checkbox" name="is_active" checked style="width: 25px; height: 25px;" />
                            Checked=Visible, Un-Checked=Hidden
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
