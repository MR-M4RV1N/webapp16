<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class MediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_media()
    {
        // Для заглавия
        $page_title = "Page MEDIA";

        /* Контент */
        // Список таблиц в БД
        $content = 'This is Media page!';

        return view('Media.page_media',[
            'page_title' => $page_title,
            'content' => $content
        ]);
    }

}
