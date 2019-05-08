<?php

namespace App\Http\Controllers\PRO\Svid\Iekseja;

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
    public function svid_iekseja_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
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
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'iekseja')
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


        return view('PRO.Svid.Iekseja.svid_iekseja_example',[
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