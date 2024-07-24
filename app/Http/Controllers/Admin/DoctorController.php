<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\DoctorTiming;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::all();
        return view('admin.doctor.index', compact('doctors'));
    }

    public function create()
    {
        $departments = Department::all();
        return view('admin.doctor.create', compact('departments'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'department_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
            'gender' => 'required|string|max:200',
            // 'phone' => 'required|digits:10',
            'designation' => 'required|string|max:255',
            'qualification' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'specialization' => 'nullable|string|max:1000',
            'bio' => 'nullable|string|max:1000',
            'consulation_fees' => 'nullable|integer',
            'address' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ]);


        $finalFileName = "";

        if($request->hasFile('image')){

            $uploadPath = "uploads/doctors/";

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);

            $finalFileName = $uploadPath.$filename;
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'phone' => $request->phone,
            'role_as' => 'doctor',
        ]);

        Doctor::create([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'name' => $request->name,
            'slug' =>  Str::slug($request->name).$user->id,
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
            'address' => $request->address,
            'is_active' => $request->is_active == true ? '1':'0'
        ]);

        return redirect('/admin/doctors')->with('status','Doctor Added Successfully');
    }

    public function edit(int $id)
    {
        $departments = Department::all();
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.edit', compact('departments','doctor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'department_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'password' => 'nullable|string|min:8|max:255',
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


        $doctor = Doctor::findOrFail($id);

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
        if($request->password != ""){

            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->phone = $request->phone;
        $user->is_ban = $request->is_ban == true ? 1:0;
        $user->save();

        $doctor->update([
            'user_id' => $user->id,
            'department_id' => $request->department_id,
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
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
            'address' => $request->address,
            'is_active' => $request->is_active == true ? '1':'0'
        ]);

        return redirect()->back()->with('status','Doctor Updated Successfully');

    }

    public function destroy(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        if(File::exists("$doctor->image")){
            File::delete("$doctor->image");
        }

        $user = User::findOrFail($doctor->user_id);
        $user->delete();
        $doctor->delete();

        return redirect('admin/doctors')->with('status', 'Doctor Deleted Successfully');
    }

    public function timings(int $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctorTimings = DoctorTiming::where('doctor_id', $doctor->id)->get();
        return view('admin.doctor.timing', compact('doctor','doctorTimings'));
    }

}
