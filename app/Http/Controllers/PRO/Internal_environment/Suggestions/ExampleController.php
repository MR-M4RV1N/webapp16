<?php

namespace App\Http\Controllers\PRO\Internal_environment\Suggestions;

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
    public function page_suggestions_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Priekšlikumi - iekšējā vide" => "/my_page/page_suggestions_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Stiprās puses:";
        }
        if($category == 2)
        {
            $table_title = "Vajās puses:";
        }

        //--- Для Вкладок
        $manage_link = 'page_suggestions_manage';
        $theory_link = 'page_suggestions_theory';
        $example_link = 'page_suggestions_example';
        //--- Для контента
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'suggestions')
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


        return view('PRO.Internal_environment.Suggestions.page_suggestions_example',[
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