<?php

namespace App\Http\Controllers\Panel;


use App\Permission;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PermissionController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }


    public function store(Request $request)
    {
        Permission::create($request->all());
        return response(['success']);
    }

    public function list()
    {
        $permission=Permission::all();
        return response()->json($permission);

    }

    public function edit(Permission $permission)
    {
        return response()->json($permission);
    }

    public function update(Request $request, Permission $permission)
    {
        $permission->update($request->all());
        return response(['success']);

    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return response(['success']);

    }
}
