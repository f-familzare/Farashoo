<?php

namespace App\Http\Controllers\Panel;

use App\Account;
use App\Activity;
use App\ActivityTime;
use App\City;
use App\Cooperation;
use App\DegreeOfEducation;
use App\Major;
use App\Part;
use App\Permission;
use App\Region;
use App\Related;
use App\Role;
use App\Rural;
use App\Salary;
use App\State;
use App\User;
use App\Village;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OptionController extends Controller
{

    public function state()
    {
        return response(State::all(),200);
    }
    public function city($state_id)
    {
        $state=City::where('state_id','=',$state_id)->get();
        return response()->json($state,200);
    }
    public function region($city_id)
    {
        $region=Region::where('city_id','=',$city_id)->get();
        return response()->json($region,200);
    }
    public function part($region_id)
    {
        $part=Part::where('region_id','=',$region_id)->get();
        return response()->json($part,200);
    }
    public function village($part_id)
    {
        $village=Village::where('part_id','=',$part_id)->get();
        return response()->json($village,200);
    }
    public function rural($village_id)
    {
        $rural=Rural::where('village_id','=',$village_id)->get();
        return response()->json($rural,200);
    }

    public function activity()
    {
        return response(Activity::all(),200);
    }
    public function activityTime()
    {
        return response(ActivityTime::all(),200);
    }
    public function cooperation()
    {
        return response(Cooperation::all(),200);
    }
    public function degreeOfEducation()
    {
        return response(DegreeOfEducation::all(),200);
    }
    public function salary()
    {
        return response(Salary::all(),200);
    }

    public function related()
    {
        return response()->json(Related::all(),200);
    }

    public function major()
    {

        return response()->json(Major::all(),200);
    }
    public function users()
    {
        return response()->json(User::all(),200);
    }
    public function roles()
    {
        return response()->json(Role::all(),200);
    }
    public function permission()
    {
        return response()->json(Permission::all(),200);
    }
}
