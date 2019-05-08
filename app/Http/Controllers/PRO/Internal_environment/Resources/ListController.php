<?php

namespace App\Http\Controllers\PRO\Internal_environment\Resources;

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
    public function page_resources_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Resursu analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'resources')
            ->first();

        $item1 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $item2 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'item')
            ->get();

        $item3 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 3)
            ->select('id', 'item')
            ->get();

        $item4 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 4)
            ->select('id', 'item')
            ->get();

        $item5 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 5)
            ->select('id', 'item')
            ->get();

        $item6 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 6)
            ->select('id', 'item')
            ->get();

        $item7 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 7)
            ->select('id', 'item')
            ->get();



        return view('PRO.Internal_environment.Resources.page_resources_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'selected_firm_name' => $selected_firm_name,

            // Контент
            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,
            'item5' => $item5,
            'item6' => $item6,
            'item7' => $item7,
        ]);
    }
    /*...*/

}
