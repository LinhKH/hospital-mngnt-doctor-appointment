<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Doctor;
use App\Models\DoctorTiming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TimingController extends Controller
{
    public function index()
    {
        // $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $doctor = Doctor::with('user')->find(Auth::user()->id);
        $doctorTimings = DoctorTiming::where('doctor_id', $doctor->user?->id)->get();

        return view('doctor.timings.index', compact('doctor','doctorTimings'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'day' => 'required|string',
            'shift' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'avg_consultation_time' => 'required|string'
        ]);

        // $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $doctor = Doctor::with('user')->find(Auth::user()->id);

        if(DoctorTiming::where('doctor_id',$doctor->user->id)->where('day',$request->day)->where('shift',$request->shift)->exists()){
            return redirect()->back()->with('status',$request->day .' is already added for '.$request->shift);
        }

        DoctorTiming::create([
            'doctor_id' => $doctor->id,
            'day' => $request->day,
            'shift' => $request->shift,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'avg_consultation_time' => $request->avg_consultation_time
        ]);

        return redirect()->back()->with('status','Timings Added');
    }

    public function edit(int $id)
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $doctorTiming = DoctorTiming::where('doctor_id', $doctor->id)->where('id', $id)->first();

        return view('doctor.timings.edit', compact('doctorTiming'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            // 'day' => 'required|string',
            // 'shift' => 'required|string',
            'start_time' => 'required|string',
            'end_time' => 'required|string',
            'avg_consultation_time' => 'required|string'
        ]);

        $doctor = Doctor::where('user_id', Auth::user()->id)->first();

        DoctorTiming::where('id',$id)->where('doctor_id', $doctor->id)->update([
            // 'day' => $request->day,
            // 'shift' => $request->shift,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'avg_consultation_time' => $request->avg_consultation_time
        ]);

        return redirect()->back()->with('status', 'Timings Updated');
    }

    public function destroy(int $id)
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        $timing = DoctorTiming::where('id',$id)->where('doctor_id', $doctor->id)->first();

        if($timing){
            $timing->delete();
            return redirect()->back()->with('status', 'Timings Deleted');
        }else{
            return redirect()->back()->with('status', 'Something went wrong');
        }
    }
}
