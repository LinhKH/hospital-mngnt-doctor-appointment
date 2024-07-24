@extends('layouts.admin')

@section('title','Doctors')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Doctors List
                    <a href="{{ url('/admin/doctors/create') }}" class="btn btn-primary float-end">Add Doctor</a>
                </h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">

                    <table id="myDataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th width="8%">ID</th>
                                <th width="10%">Image</th>
                                <th>Doctor Name</th>
                                <th>Department</th>
                                <th>Phone</th>
                                <th>Is Active</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @forelse ($doctors as $doctor)
                            <tr>
                                <td>{{ $doctor->id }}</td>
                                <td>
                                    @if ($doctor->image)
                                        <img src="{{ asset($doctor->image) }}" class="rounded-circle avatar-xs" alt="Images" />
                                    @else
                                        <img src="{{ asset('assets/images/no-img.jpg') }}" class="rounded-circle avatar-xs" alt="Images" />
                                    @endif
                                </td>
                                <td>{{ $doctor->name }}</td>
                                <td>{{ $doctor->department->name ?? 'None' }}</td>
                                <td>{{ $doctor->phone }}</td>
                                <td>
                                    @if ($doctor->is_active)
                                        <span class="badge bg-label-primary me-1">Active</span>
                                    @else
                                        <span class="badge bg-label-warning me-1">In Active</span>
                                    @endif
                                </td>
                                <td>
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('admin/doctors/'.$doctor->id.'/timings') }}">
                                                <i class="bx bx-calendar-alt me-1"></i> View Timings
                                            </a>
                                            <a class="dropdown-item" target="_blank" href="{{ url('find-a-doctor/'.$doctor->slug) }}">
                                                <i class="bx bx-bullseye me-1"></i> View Doctor
                                            </a>
                                            <a class="dropdown-item" href="{{ url('admin/patients?slug='.$doctor->slug) }}">
                                                <i class="bx bx-user-plus me-1"></i> View Patients
                                            </a>
                                            <a class="dropdown-item" href="{{ url('admin/doctors/'.$doctor->id.'/edit') }}">
                                                <i class="bx bx-edit-alt me-1"></i> Edit
                                            </a>
                                            <a class="dropdown-item" href="{{ url('admin/doctors/'.$doctor->id.'/delete') }}"
                                                onclick="return confirm('Are you sure you want to delete this data ?')">
                                                <i class="bx bx-trash me-1"></i> Delete
                                            </a>
                                        </div>
                                    </div>
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
