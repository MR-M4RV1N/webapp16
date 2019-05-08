<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;


class LandingController extends Controller
{

    public function index()
    {
        return view('landing');
    }

    public function about()
    {
        return view('landing_about');
    }

    public function services()
    {
        return view('landing_services');
    }

    public function contact()
    {
        return view('landing_contact');
    }


}
