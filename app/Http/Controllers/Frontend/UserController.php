<?php

namespace App\Http\Controllers\Frontend;

use App\Models\User;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function profile()
    {
        return view('frontend.user.profile');
    }

    public function profileUpdate(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|digits:10',
            'gender' => 'required|string|max:20',
            'dob' => 'nullable|string|max:100',
            'age' => 'nullable'
        ]);

        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'gender' => $request->gender,
            'dob' => $request->dob,
            'age' => $request->age
        ]);

        return redirect()->back()->with('status','Profile Updated');
    }

    public function appointment()
    {
        $appointments = Appointment::where('user_id', Auth::user()->id)->orderBy('created_at','DESC')->get();
        return view('frontend.user.my-appointments', compact('appointments'));
    }

    public function viewAppointment($appointmentNumber)
    {
        $appointment = Appointment::where('appointment_number',$appointmentNumber)->where('user_id', Auth::user()->id)->first();
        if($appointment){
            return view('frontend.user.view-appointment', compact('appointment'));
        }else{
            return redirect('/user/appointments');
        }
    }

    public function changePassword()
    {
        return view('frontend.user.change-password');
    }

    public function updateChangePassword(Request $request)
    {
        $request->validate([
            'current_password' => ['required','string','min:8'],
            'password' => ['required', 'string', 'min:8', 'confirmed']
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if($currentPasswordStatus){

            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->back()->with('status','Password Updated Successfully');

        }else{

            return redirect()->back()->with('status','Current Password does not match with Old Password');
        }
    }

    public function support()
    {
        return view('frontend.user.support');
    }
}
