<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::autheDoctor();

        if ($request->has('date')) {
            $appointments = $appointments->whereDate('appointment_date', $request->date);
        }
        // else{
        //     $appointments = $appointments->whereDate('created_at', '>=', Carbon::today());
        // }

        $appointments = $appointments->orderBy('appointment_date', 'DESC')->get();

        // $appointments = Appointment::autheDoctor()
        //                     ->whereDate('created_at', '>=', Carbon::today())
        //                     ->where('status','booked')
        //                     ->get();
        return view('doctor.appointments.index', compact('appointments'));
    }

    public function history(Request $request)
    {
        if(isset($request->monthyear) && $request->monthyear != ''){
            $currentYear = date('Y', strtotime($request->monthyear));
            $currentMonth = date('m', strtotime($request->monthyear));
        }else{
            $currentYear = Carbon::today()->format('Y');
            $currentMonth = Carbon::today()->format('m');
        }

        $appointments = Appointment::autheDoctor()
                            ->whereMonth('created_at', $currentMonth)
                            ->whereYear('created_at', $currentYear)
                            ->get();
        return view('doctor.appointments.history', compact('appointments'));
    }

    public function show($appointment_number)
    {
        $appointment = Appointment::autheDoctor()->where('appointment_number', $appointment_number)->first();
        return view('doctor.appointments.show', compact('appointment'));
    }

    public function appointmentPatientUpdate(Request $request, $appointment_number)
    {
        $appointment = Appointment::autheDoctor()->where('appointment_number', $appointment_number)->first();
        $appointment->user()->update([
            'age' => $request->age,
            'gender' => $request->gender,
            'dob' => $request->dob
        ]);
        return redirect()->back()->with('status', 'Patient Data Updated');
    }

    public function appointmentUpdate(Request $request, $appointment_number)
    {
        $appointment = Appointment::autheDoctor()->where('appointment_number', $appointment_number)->first();
        $appointment->update([
            'consulation_fees' => $request->consulation_fees,
            'consulation_fees_status' => $request->consulation_fees_status,
            'doctor_comment' => $request->doctor_comment,
            'status' => $request->status
        ]);
        return redirect()->back()->with('status', 'Appointment Status Updated');
    }
}
