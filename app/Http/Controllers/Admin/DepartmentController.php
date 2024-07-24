<?php

namespace App\Http\Controllers\Admin;

use App\Models\Department;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::all();
        return view('admin.department.index', compact('departments'));
    }

    public function create()
    {
        return view('admin.department.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'description' => 'nullable|string|max:2000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ]);

        $finalFileName = "";

        if($request->hasFile('image')){

            $uploadPath = "uploads/departments/";

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);

            $finalFileName = $uploadPath.$filename;
        }

        Department::create([
            'name' => $request->name,
            'slug' =>  Str::slug($request->name),
            'description' => $request->description,
            'image' => $finalFileName,
            'is_active' => $request->is_active == true ? '1':'0'
        ]);

        return redirect('/admin/departments')->with('status','Department Added Successfully');
    }

    public function edit(int $id)
    {
        $department = Department::findOrFail($id);
        return view('admin.department.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:200',
            'slug' => 'required|string|max:200',
            'description' => 'nullable|string|max:2000',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,webp'
        ]);

        $department = Department::findOrFail($id);

        if($request->hasFile('image')){

            $uploadPath = "uploads/departments/";

            if(File::exists("$department->image")){
                File::delete("$department->image");
            }

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);

            $finalFileName = $uploadPath.$filename;
        }else{

            $finalFileName = $department->image;
        }


        $department->update([
            'name' => $request->name,
            'slug' =>  Str::slug($request->slug),
            'description' => $request->description,
            'image' => $finalFileName,
            'is_active' => $request->is_active == true ? '1':'0'
        ]);

        return redirect()->back()->with('status','Department Updated Successfully');
    }

    public function destroy(int $id)
    {
        $department = Department::findOrFail($id);
        if(File::exists("$department->image")){
            File::delete("$department->image");
        }
        $department->delete();
        return redirect('admin/departments')->with('status', 'Department Deleted Successfully');
    }
}
