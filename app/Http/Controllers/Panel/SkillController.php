<?php

namespace App\Http\Controllers\Panel;

use App\Rezume;
use App\Skill;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SkillController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $rezume_id=auth()->id();
//        $rezume = Rezume::find($rezume_id);
//        $rezume->skills()->create
        Skill::create([
            'rezume_id' => $rezume_id,
            'skill_title' => $request->input('skill_title'),
            'skill_level' => $request->input('skill_level'),
        ]);

        return response('success', 200);
    }

    public function list()
    {
        $account=Skill::all();
        return response($account,200);
    }

    public function edit($id)
    {
        $skill=Skill::find($id);
        return response($skill);
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::find($id);
        $skill->update([
            'skill_title' => $request->input('skill_title'),
            'skill_level' => $request->input('skill_level'),
        ]);
        return response('success', 200);
    }

    public function delete($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return response('success', 200);
    }
}
