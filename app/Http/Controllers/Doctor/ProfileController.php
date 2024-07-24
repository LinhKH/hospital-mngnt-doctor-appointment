<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use App\Models\Doctor;
use App\Models\DoctorTiming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        $doctor = Doctor::where('user_id', Auth::user()->id)->first();
        return view('doctor.doctor.profile', compact('doctor'));
    }

    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:200',
            'phone' => 'required|digits:10',
            'designation' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:1000',
            'consulation_fees' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ]);


        $doctor = Doctor::where('user_id', Auth::user()->id)->first();

        if($request->hasFile('image')){

            $uploadPath = "uploads/doctors/";

            if(File::exists("$doctor->image")){
                File::delete("$doctor->image");
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);

            $finalFileName = $uploadPath.$filename;
        }else{

            $finalFileName = $doctor->image;
        }

        $user = User::findOrFail($doctor->user_id);
        $user->name = $request->name;
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->save();

        $doctor->update([
            'user_id' => $user->id,
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'designation' => $request->designation,
            'qualification' => $request->qualification,
            'experience' => $request->experience,
            'specialization' => $request->specialization,
            'bio' => $request->bio,
            'consulation_fees' => $request->consulation_fees,
            'address' => $request->address,
            'image' => $finalFileName,
            'address' => $request->address
        ]);

        return redirect()->back()->with('status','Profile Updated');

    }


    public function password()
    {
        return view('doctor.doctor.change-password');
    }

    public function changePassword(Request $request)
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

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status','Logged Out Successfully');
    }
}
