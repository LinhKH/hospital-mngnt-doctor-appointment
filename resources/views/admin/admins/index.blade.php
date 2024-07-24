@extends('layouts.admin')

@section('title','Admin')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Admin
                    <a href="{{ url('admin/manage-admins/create') }}" class="btn btn-primary float-end">Add Admin</a>
                </h4>
            </div>
            <div class="card-body">

                <table id="myDataTable" class="table table-striped table-bordered mt-2">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($admins as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone ?? 'X' }}</td>
                            <td><span class="badge bg-warning">{{ $item->role_as }}</span></td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ url('admin/manage-admins/'.$item->id.'/edit') }}">
                                    <i class="bx bx-pencil me-1"></i> Edit
                                </a>
                                <a class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this data?')"
                                    href="{{ url('admin/manage-admins/'.$item->id.'/delete') }}">
                                    <i class="bx bx-trash me-1"></i> Delete
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
