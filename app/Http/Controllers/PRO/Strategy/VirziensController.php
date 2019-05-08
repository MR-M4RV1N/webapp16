<?php

namespace App\Http\Controllers\PRO\Strategy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class VirziensController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function strategija_virziens_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Virziens";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'virziens')
            ->first();

        $selected_item_result = DB::table('model_virziens')
            ->select('selected_strategy')
            ->where('firm_name', $selected_firm)
            ->where('strategy_name', 'virziens')
            ->get();
        if(!empty($selected_item_result[0]->selected_strategy))
        {
            $selected_item = $selected_item_result[0]->selected_strategy;
        }
        else
        {
            $selected_item = null;
        }


        return view('PRO.Strategy.strategija_virziens_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_item' => $selected_item,
        ]);
    }

    /*... UPDATE ...*/
    public function strategija_virziens_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_item = $data['exampleRadios'];

        /*... ЧАСТЬ 2 ...*/
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Проверяем была ли сделанна запись
        $check_selected_value = DB::table('model_virziens')
            ->select('selected_strategy')
            ->where('strategy_name', 'virziens')
            ->where('firm_name', $selected_firm)
            ->get();

        if(isset($check_selected_value[0]->selected_strategy))
        {
            // Обновляем запись
            DB::table('model_virziens')
                ->where('firm_name', $selected_firm)
                ->where('strategy_name', 'virziens')
                ->update([
                    'selected_strategy' => $selected_item
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('strategija_virziens_list')->with('success','Updated!');
        }
        else
        {
            // Создаем запись
            DB::table('model_virziens')
                ->insert([
                    'strategy_name' => 'virziens',
                    'selected_strategy' => $selected_item,
                    'firm_name' => $selected_firm,
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('strategija_virziens_list')->with('success','Created!');
        }

    }


}
