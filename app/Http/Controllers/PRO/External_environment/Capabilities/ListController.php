<?php

namespace App\Http\Controllers\PRO\External_environment\Capabilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... LIST ...*/
    public function page_capabilities_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Priekšlikumi - ārējā vide";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'capabilities')
            ->first();

        $item1 = DB::table('model_capabilities')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $item2 = DB::table('model_capabilities')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.Capabilities.page_capabilities_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'selected_firm_name' => $selected_firm_name,

            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'item2' => $item2,
        ]);
    }
    /*...*/


}