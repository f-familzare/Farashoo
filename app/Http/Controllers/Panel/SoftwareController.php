<?php

namespace App\Http\Controllers\Panel;

use App\software;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SoftwareController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $rezume_id=auth()->id();
        software::create([
            'rezume_id' => $rezume_id,
            'software_title' => $request->input('software_title'),
            'software_level' => $request->input('software_level'),
        ]);

        return response('success', 200);
    }

    public function list()
    {
        $account=software::all();
        return response($account,200);
    }

    public function edit($id)
    {
        $software=software::find($id);
        return response($software,200);
    }

    public function update(Request $request, $id)
    {
        $software = software::find($id);
        $software->update([
            'software_title' => $request->input('software_title'),
            'software_level' => $request->input('software_level'),
        ]);
        return response('success', 200);
    }

    public function delete($id)
    {
        $software = software::find($id);
        $software->delete();
        return response('success', 200);
    }
}
