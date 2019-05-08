<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_settings()
    {
        // Для заглавия
        $page_title = "Page SETTINGS";

        /* Контент */
        // Список таблиц в БД
        $content = 'This is settings page!';

        return view('Settings.page_settings',[
            'page_title' => $page_title,
            'content' => $content
        ]);
    }

}
