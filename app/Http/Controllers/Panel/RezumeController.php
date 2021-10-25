<?php

namespace App\Http\Controllers\Panel;

use App\Academy;
use App\Account;
use App\Rezume;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RezumeController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:1024',
//            'age' => 'max:2|numeric',
//            'state_id' => 'required',
//            'city_id' => 'required',
//            'region_id' => 'required',
        ], [
            'avatar' => 'فرمت عکس نادرست است  و یا اندازه عکس بیشتر از حد مجاز است.'
        ]);
        // Upload File
        if ($request->hasFile('avatar')) {
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Rezume"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Rezume\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
        }
        $id = auth()->id();
        $user = User::find($id);
        $user->rezume()->create([
            'age' => $request->input('age'),
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'avatar' => $request->input('avatar'),
            'status' => $request->input('status'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'about_me' => $request->input('about_me'),
            'rezume_status' => 1,
        ]);


        return response()->json('success', 200);
    }

    public function edit($id)
    {
        $rezume = Rezume::join('users', 'rezumes.user_id', '=', 'users.id')
            ->join('states', 'rezumes.state_id', '=', 'states.state_id')
            ->join('cities', 'rezumes.city_id', '=', 'cities.city_id')
            ->join('regions', 'rezumes.region_id', '=', 'regions.region_id')
            ->select('users.*','rezumes.*','states.state_name', 'cities.city_name',
                'regions.region_name')->where('rezumes.id','=',$id)->first();

        $academy = Rezume::join('academies', 'rezumes.id', '=', 'academies.rezume_id')
            ->join('majors', 'academies.major_id', '=', 'majors.major_id')
            ->join('degree_of_educations', 'academies.degree_of_education_id', '=', 'degree_of_educations.degree_of_education_id')
            ->select('academies.*','majors.*','degree_of_educations.*')->where('academies.rezume_id','=',$id)->get();

        $skill = Rezume::join('skills', 'rezumes.id', '=', 'skills.rezume_id')
            ->select('skills.*')->where('skills.rezume_id','=',$id)->get();

        $language = Rezume::join('languages', 'rezumes.id', '=', 'languages.rezume_id')
            ->select('languages.*')->where('languages.rezume_id','=',$id)->get();

        $software = Rezume::join('software', 'rezumes.id', '=', 'software.rezume_id')
            ->select('software.*')->where('software.rezume_id','=',$id)->get();

        $job = Rezume::join('jobs', 'rezumes.id', '=', 'jobs.rezume_id')
            ->join('activities', 'rezumes.id', '=', 'activities.activity_id')
            ->join('cooperations', 'rezumes.id', '=', 'cooperations.cooperation_id')
            ->join('salaries', 'rezumes.id', '=', 'salaries.salary_id')
            ->join('activity_times', 'rezumes.id', '=', 'activity_times.activity_time_id')
            ->select('jobs.*','activities.*','cooperations.*','salaries.*','activity_times.*')->where('jobs.rezume_id','=',$id)->get();

        return response()->json(['rezume'=>$rezume,'academy'=>$academy,'skill'=>$skill,'language'=>$language,'software'=>$software,'job'=>$job], 200);
    }

    public function rezumeStatus()
    {
        $id = auth()->id();
        $RezumeId=Rezume::where('user_id', '=', $id)->pluck('id')->first();

        $account = Rezume::where('user_id', '=', $id)->first();
        if (is_null($account)) {
            $answer = 0;
        } else {
            $answer = 1;
        }
        return response()->json(['status'=>$answer,'id'=>$RezumeId], 200);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'avatar' => 'image|mimes:jpg,png,jpeg|max:1024',
//            'age' => 'max:2|numeric'

        ], [
            'avatar' => 'فرمت عکس نادرست است  و یا اندازه عکس بیشتر از حد مجاز است.'
        ]);
        $rezume = Rezume::find($id);

        // Upload File
        if ($request->hasFile('avatar')) {
            if (file_exists($rezume->avatar)) {
                unlink($rezume->avatar);
            }
            $filename = md5(rand(100000, 999999));
            $file_obj = $request->file('avatar');
            $file_obj->move(public_path("uploads\\Rezume"), $filename . "." . $file_obj->getClientOriginalExtension());
            $request->request->add(["avatar" => 'uploads\\Rezume\\' . $filename . "." . $file_obj->getClientOriginalExtension()]);
            $rezume->update(['avatar' => $request->input('avatar')]);
        }

        $rezume->update([
            'name' => $request->input('name'),
            'last_name' => $request->input('last_name'),
            'age' => $request->input('age'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
            'state_id' => $request->input('state_id'),
            'city_id' => $request->input('city_id'),
            'region_id' => $request->input('region_id'),
            'about_me' => $request->input('about_me'),
            'rezume_status' => 1,
        ]);
        return response()->json('success', 200);

    }

    public function delete($id)
    {
        $fileUpload = Rezume::find($id);
        if (file_exists($fileUpload->avatar)) {
            unlink($fileUpload->avatar);
        }
        $fileUpload->delete($id);
        return response()->json('success', 200);

    }

    public function list()
    {
        $rezumes=Rezume::with('user','jobs','skills','languages','software','academy')->get();
        return response()->json($rezumes);
    }
}
