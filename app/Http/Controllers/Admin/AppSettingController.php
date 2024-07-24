<?php

namespace App\Http\Controllers\Admin;

use App\Models\AppSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\AppSettingFormRequest;

class AppSettingController extends Controller
{
    public function index()
    {
        $setting = AppSetting::first();
        return view('admin.setting.index', compact('setting'));
    }

    public function createOrUpdate(AppSettingFormRequest $request)
    {
        $data = $request->validated();

        $appSetting = AppSetting::first();

        if($request->hasFile('image')){

            $uploadPath = "uploads/";

            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);


            if(File::exists($appSetting->image)){
                File::delete($appSetting->image);
            }

            $data['image'] = $uploadPath . $filename;
        }

        if($request->hasFile('favicon')){

            $uploadPath = "uploads/";

            $file = $request->file('favicon');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move($uploadPath,$filename);

            if(File::exists($appSetting->favicon)){
                File::delete($appSetting->favicon);
            }

            $data['favicon'] = $uploadPath . $filename;
        }

        AppSetting::updateOrCreate(['id' => $appSetting->id ?? null],$data);

        return redirect()->back()->with([
            'status' => 'Setting Saved',
            'status_type' => 'success',
        ]);
    }
}
