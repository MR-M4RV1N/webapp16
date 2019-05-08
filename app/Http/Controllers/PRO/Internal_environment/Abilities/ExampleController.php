<?php

namespace App\Http\Controllers\PRO\Internal_environment\Abilities;

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
    public function page_abilities_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "SPĒJU ANALĪZE:";
        }

        //--- Для Вкладок
        $manage_link = 'page_abilities_manage';
        $theory_link = 'page_abilities_theory';
        $example_link = 'page_abilities_example';
        //--- Для контента
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'abilities')
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


        return view('PRO.Internal_environment.Abilities.page_abilities_example',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
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