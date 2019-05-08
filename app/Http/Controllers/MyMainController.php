<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyMainController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        return view('myhome');
    }

    public function page() {
        $res_terms = DB::table('Terms')
            ->select('name', 'description')
            ->get();

        return view('page_main',compact('terms'),[
            'res_terms' => $res_terms
        ]);
    }

}
