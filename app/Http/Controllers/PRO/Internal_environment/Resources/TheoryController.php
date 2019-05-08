<?php

namespace App\Http\Controllers\PRO\Internal_environment\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class TheoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... THEORY ...*/
    public function page_resources_theory($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Teorētiskie aspekti";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Resursu analīze" => "/my_page/page_resources_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Finansiālie resursi:";
        }
        if($category == 2)
        {
            $table_title = "Fiziskie resursi:";
        }
        if($category == 3)
        {
            $table_title = "Tehnologiskie resursi:";
        }
        if($category == 4)
        {
            $table_title = "Reputācija:";
        }
        if($category == 5)
        {
            $table_title = "Iemaņas un zināšanas:";
        }
        if($category == 6)
        {
            $table_title = "Mijiedarbības spēja:";
        }
        if($category == 7)
        {
            $table_title = "Motivācija:";
        }

        //--- Для Вкладок
        $manage_link = 'page_resources_manage';
        $theory_link = 'page_resources_theory';
        $example_link = 'page_resources_example';
        //--- Для контента
        $theory = DB::table('table_theories_and_examples')
            ->where('model_name', 'resources')
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

        return view('PRO.Internal_environment.Resources.page_resources_theory',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
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