<?php

namespace App\Http\MyFunctions;

use DB;
use Auth;

class GetProgress
{
    /*... Table ...*/
    static function check_canvas_table_item($item)
    {
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        $check_canvas_item = DB::table('firm_canvas')
            ->select('item')
            ->where('category', $item)
            ->where('firm_name', $selected_firm_id)
            ->get();
        if($check_canvas_item == null)
        {
            $progress_canvas_item = 0;
        }
        else
        {
            $progress_canvas_item = 1;
        }


        return $progress_canvas_item;
    }


    static function check_canvas_table()
    {
        $kp = GetProgress::check_canvas_table_item('kp');
        $kd = GetProgress::check_canvas_table_item('kd');
        $kr = GetProgress::check_canvas_table_item('kr');
        $cp = GetProgress::check_canvas_table_item('cp');
        $vk = GetProgress::check_canvas_table_item('vk');
        $ks = GetProgress::check_canvas_table_item('ks');
        $ps = GetProgress::check_canvas_table_item('ps');
        $si = GetProgress::check_canvas_table_item('si');
        $pd = GetProgress::check_canvas_table_item('pd');

        $canvas = $kp + $kd +$kr + $cp + $vk + $ks + $ps + $si + $pd;
        if($canvas == 9) {$check_canvas = 1;}
        else {$check_canvas = 0;}

        return $check_canvas;
    }

    /*... Strategy ...*/
    static function check_canvas_strategy($cat)
    {
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        // Шаг:1 - Достаем информацию
        $check_result = DB::table('canvas_strategy')
            ->select('content')
            ->where('cat', $cat)
            ->where('firm_name', $selected_firm_id)
            ->get();
        // Шаг:2 - Зезультат превращаем в массив
        $check_arr = $check_result->toArray();
        // Шаг:3 - Проверяем пустой или нет
        if($check_arr == null)
        {
            $progress = 0;
        }
        else
        {
            $progress = 1;
        }

        return $progress;
    }

    static function check_factors()
    {
        $factors = GetProgress::check_canvas_strategy('factors');

        return $factors;
    }

    static function check_estimate()
    {
        $estimate = GetProgress::check_canvas_strategy('estimate');

        return $estimate;
    }


    static function check_ocean()
    {
        $ocean = GetProgress::check_canvas_strategy('ocean');

        return $ocean;
    }

    static function check_multi()
    {
        $multi = GetProgress::check_canvas_strategy('multi');

        return $multi;
    }


    /*... Table + Strategy (Все 5/5 моделей) ...*/
    static function check_canvas_total()
    {
        $table = GetProgress::check_canvas_table();
        $factors = GetProgress::check_factors();
        $estimate = GetProgress::check_estimate();
        $ocean = GetProgress::check_ocean();
        $multi = GetProgress::check_multi();

        $progress = $table + $factors + $estimate + $ocean + $multi;

        return $progress;
    }


// ===================================================================================
// --- 1.Инструменты -------------------------------------------------------------------

    /*... Table ...*/
    static function check_model($table)
    {
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        $model = DB::table($table)
            ->where('firm_name', $selected_firm_id)
            ->get();

        if(isset($model[0]))
        {
            $progress = 1;
        }
        else
        {
            $progress = 0;
        }


        return $progress;
    }



    static function check_ie()
    {
        $m1 = GetProgress::check_model('model_ife');
        $m2 = GetProgress::check_model('model_efe');

        $check_m3 = $m1 + $m2;
        if($check_m3 == 2)
        {
            $m3 = 1;
        }
        else
        {
            $m3 = 0;
        }

        return $m3;
    }

// --- 2.Подщет прогресса для каждого раздела -------------------------------------------------------------------


    static function total_description()
    {
        $a = GetProgress::check_model('model_description');
        $b = GetProgress::check_model('model_canvas');

        $total = $a + $b;

        return $total;
    }

    static function total_external_environment()
    {
        $m1 = GetProgress::check_model('pest');
        $m2 = GetProgress::check_model('model_circle');
        $m3 = GetProgress::check_model('model_forces');
        $m4 = GetProgress::check_model('model_barriers');
        $m5 = GetProgress::check_model('model_success');
        $m6 = GetProgress::check_model('model_competitors');
        $m7 = GetProgress::check_model('model_capabilities');

        $total = $m1 + $m2 + $m3 + $m4 + $m5 + $m6 + $m7;

        return $total;
    }

    static function total_internal_environment()
    {
        $m1 = GetProgress::check_model('model_resources');
        $m2 = GetProgress::check_model('model_abilities');
        $m3 = GetProgress::check_model('model_contribution');
        $m4 = GetProgress::check_model('model_suggestions');

        $total = $m1 + $m2 + $m3 + $m4;

        return $total;
    }

    static function total_swot()
    {
        $m1 = GetProgress::check_model('svid_table_1');
        $m2 = GetProgress::check_model('svid_table_2');
        $m3 = GetProgress::check_model('svid_tows');

        $total = $m1 + $m2 + $m3;

        return $total;
    }

    static function total_ie()
    {
        $m1 = GetProgress::check_model('model_ife');
        $m2 = GetProgress::check_model('model_efe');

        $check_m3 = $m1 + $m2;
        if($check_m3 == 2)
        {
            $m3 = 1;
        }
        else
        {
            $m3 = 0;
        }

        $total = $m1 + $m2 + $m3;

        return $total;
    }


    static function total_strategy()
    {
        $m1 = GetProgress::check_model('model_prieksrocibas');
        $m2 = GetProgress::check_model('model_virziens');
        $m3 = GetProgress::check_model('model_lidzekli');
        $m4 = GetProgress::check_model('strategija_merki');

        $total = $m1 + $m2 + $m3 + $m4;

        return $total;
    }


    static function total_tests()
    {
        $m1 = GetProgress::check_model('model_skoulz');
        $m2 = GetProgress::check_model('model_rumelt');
        $m3 = GetProgress::check_model('model_grant');

        $total = $m1 + $m2 + $m3;

        return $total;
    }

// --- 3.Подщет общего прогресса -------------------------------------------------------------------

    static function total_progress()
    {
        $p1 = GetProgress::total_description();
        $p2 = GetProgress::total_external_environment();
        $p3 = GetProgress::total_internal_environment();
        $p4 = GetProgress::total_swot();
        $p5 = GetProgress::total_ie();
        $p6 = GetProgress::total_strategy();
        $p7 = GetProgress::total_tests();

        $selected_view_type = GetSelectedFirm::view_type();
        if($selected_view_type == null)
        {
            $selected_view_type = 2;
        }

        if($selected_view_type == 1)
        {
            $total = $p1 + $p4 + $p6;
        }
        if($selected_view_type == 2)
        {
            $total = $p1 + $p2 + $p3 + $p4 + $p6 + $p7;
        }
        if($selected_view_type == 3)
        {
            $total = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7;
        }


        return $total;
    }


}
