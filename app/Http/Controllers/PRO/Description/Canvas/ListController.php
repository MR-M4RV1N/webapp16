<?php

namespace App\Http\Controllers\PRO\Description\Canvas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... LIST ...*/
    public function page_canvas_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Canvas Business Model";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('canvas');
        $firm_canvas_result = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->get();


        $model_canvas_kp_result = DB::table('model_canvas')->where('category', 'kp')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_kd_result = DB::table('model_canvas')->where('category', 'kd')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_cp_result = DB::table('model_canvas')->where('category', 'cp')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_vk_result = DB::table('model_canvas')->where('category', 'vk')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_ps_result = DB::table('model_canvas')->where('category', 'ps')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_kr_result = DB::table('model_canvas')->where('category', 'kr')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_ks_result = DB::table('model_canvas')->where('category', 'ks')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_si_result = DB::table('model_canvas')->where('category', 'si')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_pd_result = DB::table('model_canvas')->where('category', 'pd')->where('firm_name', $selected_firm_id)->count();


        return view('PRO.Description.Canvas.page_canvas_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,
            // Для контента
            'table_models_text' => $table_models_text,
            'firm_canvas_result' => $firm_canvas_result,

            'model_canvas_kp_result' => $model_canvas_kp_result,
            'model_canvas_kd_result' => $model_canvas_kd_result,
            'model_canvas_cp_result' => $model_canvas_cp_result,
            'model_canvas_vk_result' => $model_canvas_vk_result,
            'model_canvas_ps_result' => $model_canvas_ps_result,
            'model_canvas_kr_result' => $model_canvas_kr_result,
            'model_canvas_ks_result' => $model_canvas_ks_result,
            'model_canvas_si_result' => $model_canvas_si_result,
            'model_canvas_pd_result' => $model_canvas_pd_result,
        ]);
    }
    /*...*/

}