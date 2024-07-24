@extends('layouts.admin')

@section('title','Departments')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Departments List
                    <a href="{{ url('/admin/departments/create') }}" class="btn btn-primary float-end">Add Department</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="myDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Department Name</th>
                                <th>Image</th>
                                <th width="25%">Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($departments as $department)
                            <tr>
                                <td>{{ $department->id }}</td>
                                <td>{{ $department->name }}</td>
                                <td>
                                    @if ($department->image)
                                        <img src="{{ asset($department->image) }}" style="width: 60px; height: 60px" alt="Images" />
                                    @else
                                        <img src="{{ asset('assets/images/no-img.jpg') }}" style="width: 60px; height: 60px" alt="Images" />
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ url('admin/departments/'.$department->id.'/edit') }}" class="btn btn-sm btn-success">Edit</a>
                                    <a href="{{ url('admin/departments/'.$department->id.'/delete') }}"
                                        onclick="return confirm('Are you sure you want to delete this data ?')"
                                        class="btn btn-sm btn-danger mx-1">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">No Record Found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
