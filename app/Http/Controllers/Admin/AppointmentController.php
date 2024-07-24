<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::query();

        if($request->has('date')) {

            if($request->has('type')){

                if($request->type == 'aptcrtdt'){
                    $appointments = $appointments->whereDate('created_at', $request->date);
                }else{
                    $appointments = $appointments->whereDate('appointment_date', $request->date);
                }
            }
        }else{
            $appointments = $appointments->whereDate('created_at', '>=', Carbon::today());
        }

        $appointments = $appointments->get();
        return view('admin.appointments.index', compact('appointments'));
    }

    public function show($appointment_number)
    {
        $appointment = Appointment::where('appointment_number', $appointment_number)->first();
        return view('admin.appointments.show', compact('appointment'));
    }

    public function create()
    {
        $doctors = Doctor::where('is_active', true)->get();
        return view('admin.appointments.create', compact('doctors'));
    }
}
