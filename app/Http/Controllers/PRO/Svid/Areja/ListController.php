<?php

namespace App\Http\Controllers\PRO\Svid\Areja;

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
    public function svid_areja_list()
    {
        $page_sidebar = "strategy";
        $page_title = "SVID - ārējā vide";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_areja_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'x-svid-2')
            ->first();

        $svid_1 = DB::table('svid_table_2')
            ->select('id', 'item')
            ->where('firm_name', $selected_firm)
            ->where('category', 'I')
            ->get();
        $svid_2 = DB::table('svid_table_2')
            ->select('id', 'item')
            ->where('firm_name', $selected_firm)
            ->where('category', 'D')
            ->get();

        return view('PRO.Svid.Areja.svid_areja_list', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'svid_1' => $svid_1,
            'svid_2' => $svid_2,
        ]);
    }
    /*...*/

}