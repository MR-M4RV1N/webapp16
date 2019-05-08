<?php

namespace App\Http\Controllers\PRO\Internal_environment\Contribution;

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
    public function page_contribution_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Ieguldījums priekšrocībā";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'contribution')
            ->first();

        $item1 = DB::table('model_contribution')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $resources_1 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [1, 2])
            ->select('item')
            ->get();

        $resources_2 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [3, 4])
            ->select('item')
            ->get();

        $resources_3 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [5, 6, 7])
            ->select('item')
            ->get();

        $abilities = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->select('key_ability')
            ->get();

        $success = DB::table('model_success')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 7)
            ->select('item')
            ->get();


        return view('PRO.Internal_environment.Contribution.page_contribution_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,

            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'resources_1' => $resources_1,
            'resources_2' => $resources_2,
            'resources_3' => $resources_3,
            'abilities' => $abilities,
            'success' => $success,
        ]);
    }
    /*...*/

}
