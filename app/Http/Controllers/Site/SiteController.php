<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.Home');
    }
    public function SingleRezume()
    {
        return view('site.SingleRezume');
    }
    public function RezumeList()
    {
        return view('site.RezumeList');
    }
    public function BusinessList()
    {
        return view('site.BusinessList');
    }
    public function SingleBusiness()
    {
        return view('site.SingleBusiness');
    }
    public function Support()
    {
        return view('site.Support');
    }
    public function Extra()
    {
        return view('site.Extra');
    }
}
