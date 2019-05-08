<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->type == 'admin') {
            $route = "admin-console";
        }
        else{
            $route = "page-home";
        }

        return redirect()->route($route);
    }


    public function you_are_registered()
    {
        if (Auth::check()) {
            return view('auth.you_are_registered');
        }
    }
}
