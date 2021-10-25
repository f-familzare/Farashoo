<?php

namespace App\Http\Controllers\Panel;

use App\Academy;
use App\Rezume;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcademyController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }

    public function store(Request $request)
    {
        $rezume_id=auth()->id();
        $rezume = Rezume::find($rezume_id);
        $rezume->academy()->create([
            'degree_of_education_id' => $request->input('degree_of_education_id'),
            'major_id' => $request->input('major_id'),
            'collage_name' => $request->input('collage_name'),
            'education_status' => $request->input('education_status'),
            'start_date' => $request->input('start_date'),
            'end_date' => $request->input('end_date'),
            'mark' => $request->input('mark'),
        ]);

        return response('success', 200) ;
    }

    public function list()
    {
        $account= Academy::join('rezumes', 'academies.rezume_id', '=', 'rezumes.id')
            ->join('degree_of_educations', 'academies.degree_of_education_id', '=', 'degree_of_educations.degree_of_education_id')
            ->join('majors', 'academies.major_id', '=', 'majors.major_id')
            ->select('academies.*',  'degree_of_educations.degree_of_education_title', 'majors.major_title')
            ->get();
//        $account =Academy::with('rezume')->get();
        return response($account,200);
    }

    public function edit($id)
    {
        $data=Academy::with('degreeOfEducation')
            ->whereId($id)
            ->get();
        return response($data);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
           'end_date'=>'nullable'
        ]);
        $academy = Academy::find($id);
//        $academy->update([
////            'degree_of_education_id' => $request->input('degree_of_education'),
////            'major' => $request->input('major'),
////            'collage_name' => $request->input('collage'),
////            'education_status' => $request->input('education_status'),
////            'start_date' => $request->input('start_date'),
////            'end_date' => $request->input('end_date'),
////            'mark' => $request->input('mark'),
////        ]);
$academy->update($request->all());
        return response('success', 200) ;
    }

    public function delete($id)
    {
        $academy = Academy::find($id);
        $academy->delete();
        return response('success', 200);
    }
}
