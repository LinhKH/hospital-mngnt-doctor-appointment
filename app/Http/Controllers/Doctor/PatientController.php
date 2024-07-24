<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PatientController extends Controller
{
    public function index()
    {
        $doctorId = Doctor::where('user_id', Auth::user()->id)->pluck('id');
        $userPatientIds = Appointment::where('doctor_id', $doctorId)->get(['user_id']);

        $patients = User::whereIn('id', $userPatientIds)->orderBy('id','DESC')->get();
        return view('doctor.patients.index', compact('patients'));
    }

    public function edit($id)
    {
        $patient = User::findOrFail($id);
        return view('doctor.patients.edit', compact('patient'));
    }

    public function appointments($id)
    {
        $doctorId = Doctor::where('user_id', Auth::user()->id)->pluck('id');
        $userPatientAppointmentsLists = Appointment::where('doctor_id', $doctorId)->where('user_id',$id)->orderBy('appointment_date', 'DESC')->get();
        return view('doctor.patients.appointments', compact('userPatientAppointmentsLists'));
    }

    public function update(Request $request, $id)
    {
        $patient = User::findOrFail($id);
        $patient->age = $request->age;
        $patient->gender = $request->gender;
        $patient->phone = $request->phone;
        $patient->dob = $request->dob;
        $patient->update();
        return redirect()->back()->with('status','Patient Data Updated Successfully.');
    }
}
