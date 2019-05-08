<?php

namespace App\Http\MyFunctions;

use DB;
use Auth;

class GetSelectedFirm
{
    static function selected_firm_id()
    {
        $user = Auth::user()->name;

        //-- Узнаем какая фирма была выбранна
        $selected_firm_result = DB::table('user_selected_firm')
            ->select('selected_firm')
            ->where('user', $user)
            ->first();
        if($selected_firm_result !== null)
        {
            $selected_firm = $selected_firm_result->selected_firm;
        }
        else
        {
            $selected_firm = 0;
        }

        return $selected_firm;
    }

    static function selected_firm_name()
    {
        $user = Auth::user()->name;

        // Узнаем какая фирма была выбранна (id)
        $selected_firm_result = DB::table('user_selected_firm')
            ->select('selected_firm')
            ->where('user', $user)
            ->first();
        if($selected_firm_result !== null)
        {
            $selected_firm = $selected_firm_result->selected_firm;

            // Получаем название фирмы
            $selected_firm_title_result = DB::table('user_firms')
                ->select('firm_name')
                ->where('id', $selected_firm)
                ->first();
            $selected_firm_name = $selected_firm_title_result->firm_name;
        }
        else
        {
            $selected_firm_name = null;
        }



        return $selected_firm_name;
    }


    static function view_type()
    {
        //-- Узнаем какая фирма была выбранна
        $selected_firm = self::selected_firm_id();

        //--- Выбранный вид
        $view_type_result = DB::table('user_firms')
            ->select('view_type')
            ->where('id', $selected_firm)
            ->first();


        return $view_type_result->view_type;
    }
}