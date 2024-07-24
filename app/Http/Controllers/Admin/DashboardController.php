<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        $totalDoctor = Doctor::count();
        $totalDepartments = Department::count();
        $totalAdmins = User::where('role_as','admin')->count();
        $totalPatients = User::where('role_as','user')->count();

        $todayAppointment = Appointment::whereDate('created_at',Carbon::today())->count();
        $completedAppointment = Appointment::where('status','completed')->count();
        $futureAppointment = Appointment::whereDate('appointment_date','>=',Carbon::today())->count();

        return view('admin.dashboard', compact('totalDepartments','totalDoctor','totalAdmins','totalPatients',
            'todayAppointment','completedAppointment','futureAppointment'));
    }
}
