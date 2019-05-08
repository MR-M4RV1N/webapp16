<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DatabaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_database()
    {
        // Для заглавия
        $page_title = "Page DATABASE";

        /* Контент */
        // Список таблиц в БД
        $sql = DB::select('SHOW TABLES');

        return view('Database.page_database',[
            'page_title' => $page_title,
            'sql' => $sql,
        ]);
    }

}
