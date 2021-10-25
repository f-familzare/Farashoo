<?php

namespace App\Http\Controllers\Panel;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SliderController extends Controller
{
    public function list()
    {
        return response()->json(Slider::all(), 200);

    }

    public function store(Request $request)
    {
        if ($request->hasFile('ImgUrl')) {
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('ImgUrl');
            $file_obj->move(public_path("uploads\\Slider"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["ImgUrl" => 'uploads\\Slider\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
        }
        Slider::create([
            'ImgUrl'=>$request->input('ImgUrl')
        ]);
        return response()->json(['massage' => 'success'], 200);
    }

    public function destroy($id)
    {
        $slider=Slider::find($id);
        if (file_exists($slider->ImgUrl)) {
            unlink($slider->ImgUrl);
        }
        return response()->json(['massage' => 'success'], 200);
    }
}
