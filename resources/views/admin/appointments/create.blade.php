@extends('layouts.admin')

@section('title','Appointments')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Create Appointment by selecting Doctors</h4>
            </div>
            <div class="card-body">

                <table id="myDataTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Doctor Name</th>
                            <th>Designation</th>
                            <th>Book Appoitment</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($doctors as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->designation }}</td>
                            <td>
                                <a href="{{ url('book-appointment/'.$item->slug) }}"
                                    target="_blank"
                                    class="btn btn-primary btn-sm">
                                    Book Appointment
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
