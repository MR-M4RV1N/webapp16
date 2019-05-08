<?php

namespace App\Http\Controllers\PRO\Strategy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class LidzekliController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*... READ / EDIT ...*/
    public function strategija_lidzekli_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Līdzekļi";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );

        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'lidzekli')
            ->first();

        $selected_item = DB::table('model_lidzekli')
            ->select('selected_strategy')
            ->where('firm_name', $selected_firm)
            ->where('strategy_name', 'lidzekli')
            ->get();
        //--- Нужно делать проверку иначе вылезет ошибка "Undefined offset: 0"
        if(!empty($selected_item[0]))
        {
            $result = $selected_item[0]->selected_strategy;
        }
        else
        {
            $result = null;
        }

        return view('PRO.Strategy.strategija_lidzekli_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_item' => $result,
        ]);
    }

    /*... UPDATE ...*/
    public function strategija_lidzekli_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_item = $data['exampleRadios'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Проверяем была ли сделанна запись
        $check_selected_value = DB::table('model_lidzekli')
            ->select('selected_strategy')
            ->where('strategy_name', 'lidzekli')
            ->where('firm_name', $selected_firm)
            ->get();

        if(isset($check_selected_value[0]->selected_strategy))
        {
            // Обновляем запись
            DB::table('model_lidzekli')
                ->where('firm_name', $selected_firm)
                ->where('strategy_name', 'lidzekli')
                ->update([
                    'selected_strategy' => $selected_item
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('strategija-lidzekli-list')->with('success','Updated!');
        }
        else
        {
            // Создаем запись
            DB::table('model_lidzekli')
                ->insert([
                    'strategy_name' => 'lidzekli',
                    'selected_strategy' => $selected_item,
                    'firm_name' => $selected_firm,
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('strategija-lidzekli-list')->with('success','Created!');
        }

    }


}
