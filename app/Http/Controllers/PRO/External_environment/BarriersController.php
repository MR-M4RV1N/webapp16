<?php

namespace App\Http\Controllers\PRO\External_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class BarriersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... READ / EDIT ...*/
    public function page_barriers_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Nozares ieejas un izejas barjeras";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('barriers');

        // Выбераем информацию из БД
        $selected_value_result = DB::table('model_barriers')
            ->select('selected_value')
            ->where('firm_name', $selected_firm)
            ->get();
        // Проверяем была ли сделанна запись
        if(isset($selected_value_result[0]->selected_value))
        {
            $selected_value = $selected_value_result[0]->selected_value;
        }
        else
        {
            $selected_value = null;
        }

        return view('PRO.External_environment.page_barriers_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_value' => $selected_value,
        ]);
    }


    /*... UPDATE ...*/
    public function page_barriers_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_value = $data['selected_value'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Проверяем была ли сделанна запись
        $check_selected_value = DB::table('model_barriers')
            ->select('selected_value')
            ->where('firm_name', $selected_firm)
            ->get();

        if(isset($check_selected_value[0]->selected_value))
        {
            // Обновляем запись
            DB::table('model_barriers')
                ->where('firm_name', $selected_firm)
                ->update([
                    'selected_value' => $selected_value
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('page-barriers-list')->with('success','Value selected (updated)');
        }
        else
        {
            // Создаем запись
            DB::table('model_barriers')
                ->insert([
                    'selected_value' => $selected_value,
                    'firm_name' => $selected_firm,
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('page-barriers-list')->with('success','Value selected (created)');
        }

    }


}
