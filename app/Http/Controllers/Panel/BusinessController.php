<?php

namespace App\Http\Controllers\Panel;

use App\Business;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Sodium\add;

class BusinessController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function list()
    {
        $business = Business::join('users', 'businesses.user_id', '=', 'users.id')
            ->leftJoin('states', 'businesses.state_id', '=', 'states.state_id')
            ->leftJoin('cities', 'businesses.city_id', '=', 'cities.city_id')
            ->leftJoin('regions', 'businesses.region_id', '=', 'regions.region_id')
            ->leftJoin('parts', 'businesses.part_id', '=', 'parts.part_id')
            ->leftJoin('villages', 'businesses.village_id', '=', 'villages.village_id')
            ->leftJoin('rurals', 'businesses.rural_id', '=', 'rurals.rural_id')
            ->leftJoin('activities', 'businesses.activity_id', '=', 'activities.activity_id')
            ->select('users.*', 'businesses.*', 'states.state_name', 'cities.city_name', 'regions.region_name',
                'parts.part_name', 'villages.village_name', 'rurals.rural_name', 'activities.activity_title')
            ->get();
        return response()->json($business, 200);

    }
    public function acceptedList()
    {
        $business = Business::join('users', 'businesses.user_id', '=', 'users.id')
            ->leftJoin('states', 'businesses.state_id', '=', 'states.state_id')
            ->leftJoin('cities', 'businesses.city_id', '=', 'cities.city_id')
            ->leftJoin('regions', 'businesses.region_id', '=', 'regions.region_id')
            ->leftJoin('parts', 'businesses.part_id', '=', 'parts.part_id')
            ->leftJoin('villages', 'businesses.village_id', '=', 'villages.village_id')
            ->leftJoin('rurals', 'businesses.rural_id', '=', 'rurals.rural_id')
            ->leftJoin('activities', 'businesses.activity_id', '=', 'activities.activity_id')
            ->select('users.*', 'businesses.*', 'states.state_name', 'cities.city_name', 'regions.region_name',
                'parts.part_name', 'villages.village_name', 'rurals.rural_name', 'activities.activity_title')->where('businesses.action','=','show')
            ->get();
        return response()->json($business, 200);

    }

    public function store(Request $request)
    {

        //        $this->validate($request, [
//            'avatar' => 'image|mimes:jpeg,png,jpg,gif|max:1024'
//        ], [
//            'avatar' => 'فرمت عکس نادرست است  و یا اندازه عکس بیشتر از حد مجاز است.'
//        ]);
        $id = Auth::id();
        $user = User::find($id);
        //Upload Image
        if ($request->hasFile('avatar')) {
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Business"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Business\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
        }
        //End Upload Image

        $jsonPhone = json_decode(\request('phone'), true);
        $json_social_network = json_decode(\request('social_network'), true);
        $user->business()->create(array_merge([
            'phone' => $jsonPhone,
            'social_network' => $json_social_network,
            'activity_id' => $request->input('activity_id'),
            'street' => $request->input('street'),
            'explanation' => $request->input('explanation'),
            'avatar' => $request->input('avatar'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'part_id' => $request->input('part_id'),
            'village_id' => $request->input('village_id'),
            'rural_id' => $request->input('rural_id'),
            'map' => $request->input('map'),
//            'avatar' => $request->input('avatar'),
            'action' => 'wait',
            'business_status' => 1,
        ]));
        return response()->json(['massage' => 'موفق'], 200);
    }

    public function edit($id)
    {
        $business = Business::join('users', 'businesses.user_id', '=', 'users.id')
            ->leftJoin('states', 'businesses.state_id', '=', 'states.state_id')
            ->leftJoin('cities', 'businesses.city_id', '=', 'cities.city_id')
            ->leftJoin('regions', 'businesses.region_id', '=', 'regions.region_id')
            ->leftJoin('parts', 'businesses.part_id', '=', 'parts.part_id')
            ->leftJoin('villages', 'businesses.village_id', '=', 'villages.village_id')
            ->leftJoin('rurals', 'businesses.rural_id', '=', 'rurals.rural_id')
            ->leftJoin('activities', 'businesses.activity_id', '=', 'activities.activity_id')
            ->select('users.*', 'businesses.*', 'states.state_name', 'cities.city_name', 'regions.region_name',
                'parts.part_name', 'villages.village_name', 'rurals.rural_name','activities.activity_title')
            ->where('businesses.id','=',$id)->get();
        return response()->json($business);
    }

    public function update(Request $request, $id)
    {
        $business = Business::find($id);
        //Upload Image
        if ($request->file('avatar')) {
            if (file_exists($business->avatar)) {
                unlink($business->avatar);
            }
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Business"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Business\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
            $business->update(['avatar' => $request->input('avatar')]);
        }
        //End Upload Image

        $jsonPhone = json_decode(\request('phone'), true);
        $json_social_network = json_decode(\request('social_network'), true);

        $business->update(array_merge([
            'phone' => $jsonPhone,
            'activity_id' => $request->input('activity_id'),
            'social_network' => $json_social_network,
            'street' => $request->input('street'),
            'explanation' => $request->input('explanation'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'part_id' => $request->input('part_id'),
            'village_id' => $request->input('village_id'),
            'rural_id' => $request->input('rural_id'),
            'map' => $request->input('map'),
            'action' => 'wait',
            'business_status' => 1,
        ]));

        return response()->json(['massage' => 'موفق'], 200);
    }

    public function destroy($id)
    {
        $business = Business::find($id);
        if (file_exists($business->avatar)) {
            unlink($business->avatar);
        }
        $business->delete();
    }

    public function businessStatus()
    {

        $id=Auth::id();
        $businessId=Business::where('user_id', '=', $id)->pluck('id')->first();
        $business = Business::where('user_id', '=', $id)->first();

        if (is_null($business)) {
            $status = 0;
        } else {
            $status = 1;
        }
        return response()->json(['business_status' => $status, 'id' => $businessId]);
    }

    public function acceptBusiness(Request $request)
    {
//        return $request->all();
        $business = Business::find($request->id);
        if ($request->action == 'show'){
            $business->action='show';
        }elseif ($request->action == 'hidden'){
            $business->action='hidden';
        }
        $business->save();
    }

}

