<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PatientController extends Controller
{
    public function index(Request $request)
    {
        $patients = "";

        $doctors = Doctor::get();
        if ($request->has('slug')) {

            if ($request->slug == '') {
                return redirect('/admin/patients');
            }

            $doctorId = Doctor::where('slug', $request->slug)->pluck('id');
            $userPatientIds = Appointment::where('doctor_id', $doctorId)->get(['user_id']);
            $patients = User::whereIn('id', $userPatientIds)->orderBy('id', 'DESC')->get();
        } else {
            $patients = User::orderBy('id', 'DESC')->get();
        }
        return view('admin.patients.index', compact('patients', 'doctors'));
    }

    public function appointments($userId)
    {
        $userPatientAppointmentsLists = Appointment::where('user_id', $userId)->get();
        return view('admin.patients.appointments', compact('userPatientAppointmentsLists'));
    }
}
