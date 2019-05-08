<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MyFreeController extends Controller
{

    public function page_1() {
        return view('Free.page_1');
    }


}
