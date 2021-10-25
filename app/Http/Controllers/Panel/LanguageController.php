<?php

namespace App\Http\Controllers\Panel;

use App\Language;
use App\Rezume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LanguageController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $rezume_id=auth()->id();
//        $rezume = Rezume::find($rezume_id);
        Language::create([
            'rezume_id' => $rezume_id,
            'language_title' => $request->input('language_title'),
            'language_level' => $request->input('language_level'),
        ]);

        return response('success', 200);
    }

    public function list()
    {
        $account=Language::all();
        return response($account,200);
    }

    public function edit($id)
    {
        $language=Language::find($id);
        return response($language);
    }

    public function update(Request $request, $id)
    {
        $language = Language::find($id);
        $language->update([
            'language_title' => $request->input('language_title'),
            'language_level' => $request->input('language_level'),
        ]);
        return response('success', 200);
    }

    public function delete($id)
    {
        $language = Language::find($id);
        $language->delete();
        return response('success', 200);
    }
}
