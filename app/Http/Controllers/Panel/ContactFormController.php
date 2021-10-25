<?php

namespace App\Http\Controllers\Panel;

use App\ContactForm;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactFormController extends Controller
{
    public function index()
    {
        return view('panel.master');
    }
    public function list()
    {
        $contact = ContactForm::join('relateds', 'contact_forms.related_id', 'relateds.related_id')
            ->select('contact_forms.*', 'relateds.related_title')
            ->get();
        return response()->json($contact);
    }

    public function store(Request $request)
    {
        ContactForm::create([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'related_id' => $request->input('related_id'),
            'request' => $request->input('request'),
            'email' => $request->input('email')
        ]);
        return response()->json(['massage'=>'موفق'],200);
    }

    public function show($id)
    {
        $contact=ContactForm::find($id);
        return response()->json($contact);
    }

//    public function destroy($id)
//    {
//        ContactForm::find($id)->delete();
//        return response()->json(['massage'=>'موفق'],200);
//    }
}
