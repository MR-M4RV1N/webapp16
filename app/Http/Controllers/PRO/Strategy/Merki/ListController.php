<?php

namespace App\Http\Controllers\PRO\Strategy\Merki;

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


    /*... READ ...*/
    public function strategija_merki_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Stratēģiskie mērķi";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'ss-merki')
            ->first();
        
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('firm_name', $selected_firm)
            ->get();

        return view('PRO.Strategy.Merki.strategija_merki_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }


}
