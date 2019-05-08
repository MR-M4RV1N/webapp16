<?php

namespace App\Http\Controllers\PRO\Description\Canvas;

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
    public function page_canvas_theory($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Teorētiskie aspekti";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Business Model" => "/my_page/page_canvas_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 'kp') { $table_title = "Galvenie partneri"; }
        if($category == 'kd') { $table_title = "Galvenās aktivitātes"; }
        if($category == 'kr') { $table_title = "Galvenie resursi"; }
        if($category == 'cp') { $table_title = "Vērtigie piedavājumi"; }
        if($category == 'vk') { $table_title = "Attiecības ar klientiem"; }
        if($category == 'ks') { $table_title = "Noietas kanali"; }
        if($category == 'ps') { $table_title = "Pateretāju segmenti"; }
        if($category == 'si') { $table_title = "Izdevumu struktūra"; }
        if($category == 'pd') { $table_title = "Ienākumu struktūra"; }

        //--- Для Вкладок
        $manage_link = 'page_canvas_manage';
        $theory_link = 'page_canvas_theory';
        $example_link = 'page_canvas_example';
        //--- Для контента
        $theory = DB::table('table_theories_and_examples')
            ->where('model_name', 'canvas')
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

        return view('PRO.Description.Canvas.page_canvas_theory',[
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