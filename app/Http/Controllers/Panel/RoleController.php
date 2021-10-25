<?php

namespace App\Http\Controllers\Panel;

use App\Role;
use App\RoleUser;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{

    public function index()
    {
        return view('panel.master');
    }

    public function create(Request $request)
    {
        Role::created($request->all);
        return response(['success']);
    }

    public function store(Request $request)
    {
        $jsonArray = json_decode(\request('permission_id'), true);
        $roles = Role::create($request->all());
        $roles->permissions()->sync($jsonArray);
        return response(['success']);

    }
    public function storeRoleUser(Request $request)
    {
        $user=User::find($request->user_id);
        $user->roles()->sync($request->role_id);
        return response(['success'], 200);
    }


    public function list()
    {
        $roles = Role::all();
        return response()->json($roles);
    }

    public function update(Request $request, Role $role)
    {
        $role->update($request->all());
        return response(['success']);

    }

    public function destroy(Role $role)
    {
        $role->delete();
    }


    public function changeRole(Request $request, $id)
    {
        $userId = json_decode(\request('user_id'), true);
        $roleId = json_decode(\request('role_id'), true);
        $user = User::find($id);
        if (is_null($roleId)){
            $user->roles()->sync(1);
        }
        $user->permissions()->sync($userId);
        return response(['success'], 200);
    }
}
