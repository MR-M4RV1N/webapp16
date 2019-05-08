<?php

namespace App\Http\Controllers\PRO\Strategy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class PrieksrocibasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ / EDIT ...*/
    public function strategija_prieksrocibas_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Priekšrocības";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'prieksrocibas')
            ->first();

        $selected_item = DB::table('model_prieksrocibas')
            ->where('firm_name', $selected_firm)
            ->where('strategy_name', 'prieksrocibas')
            ->select('selected_strategy')
            ->get();
        //--- Нужно делать проверку иначе вылезет ошибка "Undefined offset: 0"
        if(!empty($selected_item[0]))
        {
            $result = $selected_item[0]->selected_strategy;
        }
        else
        {
            $result = 'Strategy is not selected!';
        }

        return view('PRO.Strategy.strategija_prieksrocibas_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_item' => $result,
        ]);
    }


    /*... STORE ...*/
    public function strategija_prieksrocibas_store(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_item = $data['exampleRadios'];

        /*... ЧАСТЬ 2 ...*/
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();
        $strategy_name = "prieksrocibas";

        /*... ЧАСТЬ 3 ...*/
        //Обновляем информацию в БД
        DB::table('model_prieksrocibas')
            ->insert([
                'strategy_name' => $strategy_name,
                'selected_strategy' => $selected_item,
                'firm_name' => $selected_firm
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('strategija_prieksrocibas_list')->with('success','Stratēģija izvelēta');
    }


    /*... UPDATE ...*/
    public function strategija_prieksrocibas_update(Request $request)
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
        //Обновляем информацию в БД
        DB::table('model_prieksrocibas')
            ->where('firm_name', $selected_firm)
            ->where('strategy_name', 'prieksrocibas')
            ->update([
                'selected_strategy' => $selected_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('strategija_prieksrocibas_list')->with('success','Stratēģija izvelēta');
    }


}
