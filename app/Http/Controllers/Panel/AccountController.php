<?php

namespace App\Http\Controllers\Panel;

use App\Account;
use App\City;
use App\Region;
use App\State;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AccountController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {

        $id = auth()->id();
        $user = User::find($id);
        // Upload File
        if ($request->hasFile('avatar')) {
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Account"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Account\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
        }
        $user->account()->create([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
//            'username' => $request->input('username'),
            'mobile' => $request->input('mobile'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'gender' => $request->input('gender'),
            'avatar' => $request->input('avatar'),
            'account_status' => '1',

        ]);
        return response()->json(['success'], 200);

    }

    public function list()
    {
        $account = Account::all();
        return response($account, 200);
    }

    public function accountStatus()
    {
        $id = auth()->id();

        $account = Account::where('user_id', '=', $id)->first();
        $accountId=Account::where('user_id', '=', $id)->pluck('id')->first();

        if (is_null($account)) {
            $answer = 0;
        } else {
            $answer = 1;
        }
        return response()->json(['status' => $answer, 'id' => $accountId], 200);
    }

    public function edit($id)
    {
        $data = Account::join('users', 'accounts.user_id', '=', 'users.id')
            ->leftJoin('states', 'accounts.state_id', '=', 'states.state_id')
            ->leftJoin('cities', 'accounts.city_id', '=', 'cities.city_id')
            ->leftJoin('regions', 'accounts.region_id', '=', 'regions.region_id')
            ->select('users.*', 'accounts.*', 'states.state_name', 'cities.city_name', 'regions.region_name')
            ->where('accounts.id','=',$id)->first();
        return response()->json($data, 200);
    }

    public function update(Request $request, $id)
    {
        $accounts = Account::find($id);
        // Upload File
        if ($request->hasFile('avatar')) {
            if (file_exists($accounts->avatar)) {
                unlink($accounts->avatar);
            }
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Account"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Account\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
            $accounts->update(['avatar' => $request->input('avatar')]);
        }
//        $accounts->update($request->all());
        $accounts->update([
            'name' => $request->input('name'),
            'lastname' => $request->input('lastname'),
//            'username' => $request->input('username'),
            'mobile' => $request->input('mobile'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'gender' => $request->input('gender'),
            'account_status' => '1',
        ]);
//        $accounts->user()->update([
//            'username' => $request->input('username'),
//        ]);

        return response(['success'], 200);
    }

    public function delete($id)
    {
        $account = Account::find($id);
        $account->delete();
        return response(['success'], 200);
    }
}
