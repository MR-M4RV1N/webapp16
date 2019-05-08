<?php

namespace App\Http\Controllers\PRO\Svid\Iekseja;

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
    public function svid_iekseja_theory($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Teorētiskie aspekti";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - iekšējā vide" => "/my_page/svid_iekseja_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 'S')
        {
            $table_title = 'STIPRĀS PUSES';
        }

        if($category == 'V')
        {
            $table_title = 'VAJĀS PUSES';
        }

        //--- Для Вкладок
        $manage_link = 'svid_iekseja_manage';
        $theory_link = 'svid_iekseja_theory';
        $example_link = 'svid_iekseja_example';
        //--- Для контента
        $theory = DB::table('table_theories_and_examples')
            ->where('model_name', 'iekseja')
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

        return view('PRO.Svid.Iekseja.svid_iekseja_theory',[
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