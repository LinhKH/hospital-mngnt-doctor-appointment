<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {
        $admins = User::where('role_as','admin')->where('id', '!=', Auth::id())->get();
        return view('admin.admins.index', compact('admins'));
    }

    public function create()
    {
        return view('admin.admins.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:20',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:8|max:255',
            'gender' => 'required|string|max:20',
            'is_ban' => 'nullable',
        ]);

        User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'gender' => $request->gender,
            'is_ban' => $request->is_ban == true ? 1:0,
            'role_as' => 'admin',
        ]);

        return redirect('/admin/manage-admins')->with('status','Admin Added Successfully');
    }

    public function edit($id)
    {
        $admin = User::where('id',$id)->where('role_as','admin')->first();
        return view('admin.admins.edit', compact('admin'));
    }


    public function update(Request $request, int $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|max:20',
            'password' => 'nullable|string|min:8|max:255',
            'gender' => 'required|string|max:20',
            'is_ban' => 'nullable',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->name;
        $user->phone = $request->phone;
        if($request->password != ''){
            $user->password = Hash::make($request->password);
        }
        $user->gender = $request->gender;
        $user->is_ban = $request->is_ban == true ? 1:0;

        $user->update();

        return redirect()->back()->with('status','Admin Updated Successfully');
    }

    public function destroy(int $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/admin/manage-admins')->with('status','Admin Deleted Successfully');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login')->with('status','Logged Out Successfully');
    }
}
