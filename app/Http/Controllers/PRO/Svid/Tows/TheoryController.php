<?php

namespace App\Http\Controllers\PRO\Svid\Tows;

use App\Http\Controllers\Controller;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class TheoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... THEORY ...*/
    public function svid_tows_theory($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Teorētiskie aspekti";
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
        $theory = DB::table('table_theories_and_examples')
            ->where('model_name', 'tows')
            ->where('block_name', $category)
            ->select('theory')
            ->first();
        if($theory == null)
        {
            $theory = DB::table('table_theories_and_examples')
                ->where('model_name', 'default')
                ->where('block_name', 'default')
                ->select('theory')
                ->first();
        }

        return view('PRO.Svid.Tows.svid_tows_theory',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для вкладок
            'category' => $category,
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'theory' => $theory,
            'table_title' => $table_title,
            ]);
    }
    /*...*/

}