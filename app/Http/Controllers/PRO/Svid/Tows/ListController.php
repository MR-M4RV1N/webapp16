<?php

namespace App\Http\Controllers\PRO\Svid\Tows;

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
    public function svid_tows_list()
    {
        $page_sidebar = "strategy";
        $page_title = "SVID - TOWS analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'x-tows')
            ->first();

        $strategy_si = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'SI')
            ->select('id', 'strategy')
            ->get();
        $strategy_vi = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'VI')
            ->select('id', 'strategy')
            ->get();
        $strategy_sd = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'SD')
            ->select('id', 'strategy')
            ->get();
        $strategy_vd = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'VD')
            ->select('id', 'strategy')
            ->get();

        return view('PRO.Svid.Tows.svid_tows_list', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'strategy_si' => $strategy_si,
            'strategy_vi' => $strategy_vi,
            'strategy_sd' => $strategy_sd,
            'strategy_vd' => $strategy_vd
        ]);
    }
    /*...*/

}