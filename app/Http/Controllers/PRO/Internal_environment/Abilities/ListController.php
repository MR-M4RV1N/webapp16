<?php

namespace App\Http\Controllers\PRO\Internal_environment\Abilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... LIST ...*/
    public function page_abilities_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Spēju analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'abilities')
            ->first();

        $item = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->get();


        return view('PRO.Internal_environment.Abilities.page_abilities_list', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'table_models_text' => $table_models_text,
            'selected_firm_name' => $selected_firm_name,
            'item' => $item,
        ]);
    }
    /*...*/

}
