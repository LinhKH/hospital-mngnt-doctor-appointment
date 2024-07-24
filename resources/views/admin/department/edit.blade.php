@extends('layouts.admin')

@section('title','Edit Department')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Edit Department
                    <a href="{{ url('/admin/departments') }}" class="btn btn-danger float-end">Back</a>
                </h4>
            </div>
            <div class="card-body">

                <form action="{{ url('/admin/departments/'.$department->id.'/edit') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label>Department Name *</label>
                        <input type="text" name="name" value="{{ $department->name }}" class="form-control" />
                        @error('name') {{$message}} @enderror
                    </div>
                    <div class="mb-3">
                        <label>Department Slug (Name) *</label>
                        <input type="text" name="slug" value="{{ $department->slug }}" class="form-control" />
                        @error('name') {{$message}} @enderror
                    </div>
                    <div class="mb-3">
                        <label>Description</label>
                        <textarea name="description" class="form-control summernote" rows="4">{!! $department->description !!}</textarea>
                        @error('name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label>Upload Image</label>
                        <input type="file" name="image" class="form-control" />
                        @error('image') {{$message}} @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            @if ($department->image)
                                <img src="{{ asset($department->image) }}" style="width: 80px; height: 80px" alt="Department Image" />
                            @else
                                <img src="{{ asset('assets/images/no-img.jpg') }}" style="width: 80px; height: 80px" alt="Department Image" />
                            @endif
                        </div>
                        <div class="col-md-4 mb-3">
                            <input type="checkbox" name="is_active" {{ $department->is_active == 1 ? 'checked':'' }} style="width: 25px; height: 25px;" />
                            Checked=Visible, Un-Checked=Hidden
                        </div>
                        <div class="col-md-4 mb-3 text-end">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
