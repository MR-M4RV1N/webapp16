<?php

namespace App\Http\Controllers\PRO\Internal_environment\Contribution;

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
    public function page_contribution_theory($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Teorētiskie aspekti";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ieguldījums priekšrocībā" => "/my_page/page_contribution_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Konkurētspējas priekšrocības:";
        }

        //--- Для Вкладок
        $manage_link = 'page_contribution_manage';
        $theory_link = 'page_contribution_theory';
        $example_link = 'page_contribution_example';
        //--- Для контента
        $theory = DB::table('table_theories_and_examples')
            ->where('model_name', 'contribution')
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

        return view('PRO.Internal_environment.Contribution.page_contribution_theory',[
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