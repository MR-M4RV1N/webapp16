<?php

namespace App\Http\Controllers\PRO\Svid\Tows;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... EXAMPLE ...*/
    public function svid_tows_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - TOWS analīze" => "/my_page/svid_tows_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 'SI')
        {
            $table_title = 'SI Stratēģijas';
        }

        if($category == 'VI')
        {
            $table_title = 'VI Stratēģijas';
        }

        if($category == 'SD')
        {
            $table_title = 'SD Stratēģijas';
        }

        if($category == 'VD')
        {
            $table_title = 'VD Stratēģijas';
        }


        //--- Для Вкладок
        $manage_link = 'svid_tows_manage';
        $theory_link = 'svid_tows_theory';
        $example_link = 'svid_tows_example';
        //--- Для контента
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'tows')
            ->where('block_name', $category)
            ->select('example')
            ->first();
        if($example == null)
        {
            $example_res = DB::table('table_theories_and_examples')
                ->where('model_name', 'default')
                ->where('block_name', 'default')
                ->select('example')
                ->first();
            $example = explode("; ", $example_res->example);
        }


        return view('PRO.Svid.Tows.svid_tows_example',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для вкладок
            'category' => $category,
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'example' => $example,
            'table_title' => $table_title,
        ]);
    }
    /*...*/


}