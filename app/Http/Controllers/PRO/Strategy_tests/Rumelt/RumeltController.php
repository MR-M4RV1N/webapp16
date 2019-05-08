<?php

namespace App\Http\Controllers\PRO\Strategy_tests\Rumelt;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class RumeltController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function page_rumelt_manage()
    {
        $page_sidebar = "strategy";
        $page_title = "Rumelt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'rumelt')
            ->first();
        
        $select = DB::table('model_rumelt')
            ->where('firm_name', $selected_firm)
            ->get();
        //--- Нужно делать проверку иначе вылезет ошибка "Undefined offset: 0"
        if(!empty($select[0]))
        {
            $result[0] = array(
                "select_1" => $select[0]->select_1,
                "select_2" => $select[0]->select_2,
                "select_3" => $select[0]->select_3,
                "select_4" => $select[0]->select_4,
            );

        }
        else
        {
            $result[0] = array(
                "select_1" => null,
                "select_2" => null,
                "select_3" => null,
                "select_4" => null,
            );
        }

        return view('PRO.Strategy_tests.Rumelt.page_rumelt_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'select' => $result,
        ]);
    }

    /*... UPDATE ...*/
    public function page_rumelt_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        for($i = 1; $i <= 4; $i++)
        {
            if(isset($data['select_'.$i]))
            {
                $select[$i] = $data['select_'.$i];
            }
            else
            {
                $select[$i] = null;
            }

        }

        /*... ЧАСТЬ 2 ...*/
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Проверяем была ли сделанна запись
        $check_selected_value = DB::table('model_rumelt')
            ->where('firm_name', $selected_firm)
            ->get();

        if(!empty($check_selected_value[0]))
        {
            // Обновляем
            for($i = 1; $i <= 4; $i++)
            {
                DB::table('model_rumelt')
                    ->where('firm_name', $selected_firm)
                    ->update([
                        'select_'.$i => $select[$i],
                    ]);
            }

            /*... Передаем в вид ...*/
            return redirect()->route('page-rumelt-manage')->with('success','Updated');
        }
        else
        {
            // --- Создаем
            // -1- Добавляем фирму (создаем)
            DB::table('model_rumelt')
                ->insert([
                    'firm_name' => $selected_firm,
                ]);
            // -2- Добавляем значения (обнавляем созданный -1-)
            for($i = 1; $i <= 4; $i++)
            {
                DB::table('model_rumelt')
                    ->where('firm_name', $selected_firm)
                    ->update([
                        'select_'.$i => $select[$i],
                    ]);
            }

            /*... Передаем в вид ...*/
            return redirect()->route('page-rumelt-manage')->with('success','Created');
        }
    }

}