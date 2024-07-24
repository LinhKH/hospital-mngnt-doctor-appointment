<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $doctorId = Doctor::where('user_id', Auth::user()->id)->pluck('id');
        $userPatientIds = Appointment::where('doctor_id', $doctorId)->get(['user_id']);
        $totalPatients = User::whereIn('id', $userPatientIds)->count();

        $todayAppointment = Appointment::where('doctor_id', Auth::id())->whereDate('created_at',Carbon::today())->count();
        $completedAppointment = Appointment::where('doctor_id', Auth::id())->where('status','completed')->count();
        $futureAppointment = Appointment::where('doctor_id', Auth::id())->whereDate('appointment_date','>=',Carbon::today())->count();

        return view('doctor.dashboard', compact('totalPatients','todayAppointment','completedAppointment','futureAppointment'));
    }
}
