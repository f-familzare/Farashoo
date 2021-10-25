<?php

namespace App\Http\Controllers\Panel;

use App\Http\Resources\V1\JobResource;
use App\Job;
use App\Rezume;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class JobController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $rezume_id = auth()->id();
        $rezume = Rezume::find($rezume_id);
        $rezume->jobs()->create([
            'job_title' => $request->input('job_title'),
            'cooperation_id' => $request->input('cooperation_id'),
            'activity_id' => $request->input('activity_id'),
            'salary_id' => $request->input('salary_id'),
            'activity_time_id' => $request->input('activity_time_id'),
        ]);

        return response('success', 200);
    }

    public function list()
    {
//        $account= Job::with(['cooperation', 'activity', 'activityTime', 'salary'])
//            ->whereId($id)
//            ->get();
        $account= Job::join('rezumes', 'jobs.rezume_id', '=', 'rezumes.id')
            ->join('cooperations', 'jobs.cooperation_id', '=', 'cooperations.cooperation_id')
            ->join('activities', 'jobs.activity_id', '=', 'activities.activity_id')
            ->join('activity_times', 'jobs.activity_time_id', '=', 'activity_times.activity_time_id')
            ->join('salaries', 'jobs.salary_id', '=', 'salaries.salary_id')
            ->select('jobs.*',  'activities.activity_title', 'cooperations.cooperation_title', 'activity_times.activity_time_title', 'salaries.salary_title')
            ->get();
        return response($account, 200);
    }

    public function edit($id)
    {
        $data = Job::with(['cooperation', 'activity', 'activityTime', 'salary'])
            ->whereId($id)
            ->get();
        return response($data);
    }

    public function update(Request $request, $id)
    {
        $job = Job::find($id);
        $job->update([
            'job_title' => $request->input('job_title'),
            'cooperation_id' => $request->input('cooperation_id'),
            'activity_id' => $request->input('activity_id'),
            'salary_id' => $request->input('salary_id'),
            'activity_time_id' => $request->input('activity_time_id'),
        ]);
        return response('success', 200);
    }

    public function delete($id)
    {
        $job = Job::find($id);
        $job->delete();
        return response('success', 200);
    }
}
