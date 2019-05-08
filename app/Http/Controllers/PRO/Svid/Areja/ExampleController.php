<?php

namespace App\Http\Controllers\PRO\Svid\Areja;

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
    public function svid_areja_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - ārējā vide" => "/my_page/svid_areja_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 'I')
        {
            $table_title = "IESPĒJAS:";
        }
        if($category == 'D')
        {
            $table_title = "DRAUDI:";
        }


        //--- Для Вкладок
        $manage_link = 'svid_areja_manage';
        $theory_link = 'svid_areja_theory';
        $example_link = 'svid_areja_example';
        //--- Для контента
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'areja')
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


        return view('PRO.Svid.Areja.svid_areja_example',[
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