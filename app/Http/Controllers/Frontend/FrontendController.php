<?php

namespace App\Http\Controllers\Frontend;

use App\Enums\AppointmentStatusEnum;
use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Department;
use App\Models\Appointment;
use Illuminate\Support\Str;
use App\Models\DoctorTiming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function about()
    {
        return view('frontend.about-us');
    }

    public function contact()
    {
        return view('frontend.contact-us');
    }

    public function doctors(Request $request)
    {
        $doctors = Doctor::isActive()->when($request->doctor, function ($q, $doctor) {
            return $q->where('designation', 'LIKE', '%' . $doctor . '%');
        })->get();
        
        // if($request->has('doctor')){
        //     $doctors = Doctor::isActive()->where('designation', 'LIKE', '%'.$request->doctor.'%')->get();
        // }else{
        //     $doctors = Doctor::isActive()->get();
        // }


        return view('frontend.doctors.index', compact('doctors'));
    }

    public function doctorShow(String $name)
    {
        $doctor = Doctor::isActive()->where('slug', $name)->first();
        if (!$doctor) {
            return redirect()->back()->with("status", "Doctor not found");
        }

        return view('frontend.doctors.view', compact('doctor'));
    }

    public function departments(Request $request)
    {
        if($request->has('department')){
            $departments = Department::where('name', 'LIKE', '%'.$request->department.'%')->where('is_active', 1)->get();
        }else{
            $departments = Department::where('is_active', 1)->get();
        }
        return view('frontend.departments.index', compact('departments'));
    }

    public function departmentView(string $departmentSlug)
    {
        $department = Department::with('doctors')->where('slug', $departmentSlug)->first();

        return view('frontend.departments.view', compact('department'));
    }

    public function bookAppointment(string $doctorSlug)
    {
        $doctor = Doctor::isActive()->where('slug', $doctorSlug)->first();
        if (!$doctor) {
            return redirect()->back();
        }

        $allDates = [];
        $dayList = [];
        for ($i = 0; $i < 4; $i++) {
            $date = date('Y-m-d', strtotime("+$i days"));
            $day = date('l', strtotime($date));
            array_push($allDates,$date);
            array_push($dayList,strtolower($day));
        }

        $doctorTiming = DoctorTiming::where('doctor_id', $doctor->id)
                                    ->whereIn('day',$dayList)
                                    ->get();
        // return $doctorTiming;

        $todayDate = Carbon::now()->format('Y-m-d');

        $bookedAppointments = Appointment::where('doctor_id',$doctor->id)
                                        ->whereDate('appointment_date', '>=', $todayDate)
                                        ->where('status', AppointmentStatusEnum::Booked)
                                        ->get();
        // return $bookedAppointments;

        return view('frontend.bookings.index', compact('doctor', 'doctorTiming', 'allDates', 'bookedAppointments'));
    }

    public function placeAppointment(Request $request, $doctorSlug)
    {
        $request->validate([
            'phone' => 'required',
            'book_slot_time' => 'required',
            'book_slot_date' => 'required',
        ]);

        $doctor = Doctor::where('slug', $doctorSlug)->where('is_active', 1)->first();
        if(!$doctor) {
            return redirect()->back()->with('status','Something Went Wrong');
        }

        // need to check if slot already booked or not then place appointment

        Appointment::create([
            'user_id' => Auth::user()->id,
            'doctor_id' => $doctor->id,
            'appointment_number' => rand(111111,999999),
            'appointment_date' => $request->book_slot_date,
            'appointment_time' => date('H:i', strtotime($request->book_slot_time)),
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'consulation_fees' => $doctor->consulation_fees,
            'consulation_fees_status' => 'pending',
            'status' => AppointmentStatusEnum::Booked
        ]);


        return redirect('/user/appointments')->with('status','Appointment Booking Successful');
    }

    function getDatesFromRange($start, $days)
    {
        $dates = collect();

        $days = $days->map(function ($item) {
            return Str::ucfirst($item);
        });

        count($dates);

        while (count($dates) != 3) {
            if ($days->contains($start->format('l')))
                $dates->push($start->format('d-m-Y'));

            $start = $start->addDay();
        }

        collect([
            [
                'timing'=>'10Am',
                'status'=> 'available'
            ],
            [
                'timing'=>'11Am',
                'status'=> 'available'
            ],
            [
                'timing'=>'12pm',
                'status'=> 'unavailable'
            ],
        ]);

        return $dates;
    }
}
