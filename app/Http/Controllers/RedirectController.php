<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RedirectController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_user_alert()
    {
        $content = "user!";
        $link = '/page_main';

        return view('page_alert',[
            'content' => $content,
            'link' => $link
        ]);
    }


    public function page_gate_alert()
    {
        $content = "user!";

        return view('page_gate_alert',[
            'content' => $content
        ]);
    }
}
