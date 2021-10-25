<?php

namespace App\Http\Controllers\Panel;

use App\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{


    public function list()
    {
        $setting = Setting::all();
        return response()->json($setting, 200);
    }

    public function logo()
    {
        $logo = Setting::pluck('logo')->first();
        return response()->json($logo, 200);
    }

    public function edit($id)
    {
        $setting = Setting::find($id);
        return response()->json($setting, 200);
    }

    public function logoUpdate(Request $request, $id)
    {
        $this->validate($request, [
            'logoImg' => 'nullable|mimes:jpg,jpeg,png,gif|min:10|max:1024',
        ]);
        $setting = Setting::find($id);
        //Upload Image
        if ($request->hasFile('logo')) {
            if (file_exists($setting->logo)) {
                unlink($setting->logo);
            }
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('logo');
            $file_obj->move(public_path("uploads\\Setting"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["logo" => 'uploads\\Setting\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
            $setting->update(['logo' => $request->input('logo')]);
        }
        //End Upload Image
        return response()->json(['massage' => 'success'], 200);
    }

}
