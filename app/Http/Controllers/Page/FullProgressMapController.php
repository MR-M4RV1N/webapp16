<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetProgress;
use App\Http\Controllers\PRO\Description\FirmController;

class FullProgressMapController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function full_progress_map()
    {
        // View_Type
        $selected_view_type = GetSelectedFirm::view_type();
        if($selected_view_type == null)
        {
            $selected_view_type = 2;
        }

        if($selected_view_type == 1)
        {
            return redirect()->action('Page\FullProgressMapController@full_progress_map_1');
        }
        if($selected_view_type == 2)
        {
            return redirect()->action('Page\FullProgressMapController@full_progress_map_2');
        }
        if($selected_view_type == 3)
        {
            return redirect()->action('Page\FullProgressMapController@full_progress_map_3');
        }

    }

// ==============================

    public function full_progress_map_1()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "Pilna progresa karte";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
        );
        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $catt = DB::table('category')->select('id', 'name', 'text')->whereNotIn('id', [14, 15, 17, 19])->get();
        // Подкатегории Trial
        $subb_trial = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[0]->id)->get();
        // Подкатегории PRO
        for($i = 1; $i <= 2; $i++)
        {
            $subb_pro[] = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[$i]->id)->get();
        }
        // I. Uzņēmuma darbības analīze
        $check[0][] = GetProgress::check_model('model_description');
        $check[0][] = GetProgress::check_model('model_canvas');
        // IV. SVID analīze
        $check[1][] = GetProgress::check_model('svid_table_1');
        $check[1][] = GetProgress::check_model('svid_table_2');
        $check[1][] = GetProgress::check_model('svid_tows');
        // VI. Attīstības stratēģijas izstrāde
        $check[2][] = GetProgress::check_model('model_prieksrocibas');
        $check[2][] = GetProgress::check_model('model_virziens');
        $check[2][] = GetProgress::check_model('model_lidzekli');
        $check[2][] = GetProgress::check_model('strategija_merki');

        $check_user_type = Auth::user()->type;
        if($check_user_type == 'pro' or $check_user_type == 'admin')
        {
            $view = 'BA.full_progress_map';
        }
        else
        {
            $view = 'BA.full_progress_map_trial';
        }

        return view($view,[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            //
            'selected_firm_name' => $selected_firm_name,
            //
            'ii' => 3,
            'catt' => $catt,
            'subb_trial' => $subb_trial,
            'subb_pro' => $subb_pro,
            //
            'check' => $check,
        ]);
    }


    public function full_progress_map_2()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "Pilna progresa karte";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
        );
        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $catt = DB::table('category')->select('id', 'name', 'text')->whereNotIn('id', [17])->get();
        // Подкатегории Trial
        $subb_trial = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[0]->id)->get();
        // Подкатегории PRO
        for($i = 1; $i <= 5; $i++)
        {
            $subb_pro[] = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[$i]->id)->get();
        }
        // I. Uzņēmuma darbības analīze
        $check[0][] = GetProgress::check_model('model_description');
        $check[0][] = GetProgress::check_model('model_canvas');
        // II. Ārējās vides analīze
        $check[1][] = GetProgress::check_model('model_pest');
        $check[1][] = GetProgress::check_model('model_circle');
        $check[1][] = GetProgress::check_model('model_forces');
        $check[1][] = GetProgress::check_model('model_barriers');
        $check[1][] = GetProgress::check_model('model_success');
        $check[1][] = GetProgress::check_model('model_competitors');
        $check[1][] = GetProgress::check_model('model_capabilities');
        // III. Iekšējas vides analīze
        $check[2][] = GetProgress::check_model('model_resources');
        $check[2][] = GetProgress::check_model('model_abilities');
        $check[2][] = GetProgress::check_model('model_contribution');
        $check[2][] = GetProgress::check_model('model_suggestions');
        // IV. SVID analīze
        $check[3][] = GetProgress::check_model('svid_table_1');
        $check[3][] = GetProgress::check_model('svid_table_2');
        $check[3][] = GetProgress::check_model('svid_tows');
        // VI. Attīstības stratēģijas izstrāde
        $check[4][] = GetProgress::check_model('model_prieksrocibas');
        $check[4][] = GetProgress::check_model('model_virziens');
        $check[4][] = GetProgress::check_model('model_lidzekli');
        $check[4][] = GetProgress::check_model('strategija_merki');
        // VII. Stratēģijas realizācijas iespējas
        $check[5][] = GetProgress::check_model('model_skoulz');
        $check[5][] = GetProgress::check_model('model_rumelt');
        $check[5][] = GetProgress::check_model('model_grant');


        $check_user_type = Auth::user()->type;
        if($check_user_type == 'pro' or $check_user_type == 'admin')
        {
            $view = 'BA.full_progress_map';
        }
        else
        {
            $view = 'BA.full_progress_map_trial';
        }

        return view($view,[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            //
            'selected_firm_name' => $selected_firm_name,
            //
            'ii' => 6,
            'catt' => $catt,
            'subb_trial' => $subb_trial,
            'subb_pro' => $subb_pro,
            //
            'check' => $check,
        ]);
    }


    public function full_progress_map_3()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "Pilna progresa karte";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
        );
        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $catt = DB::table('category')->select('id', 'name', 'text')->get();
        // Подкатегории Trial
        $subb_trial = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[0]->id)->get();
        // Подкатегории PRO
        for($i = 1; $i <= 6; $i++)
        {
            $subb_pro[] = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $catt[$i]->id)->get();
        }
        // I. Uzņēmuma darbības analīze
        $check[0][] = GetProgress::check_model('model_description');
        $check[0][] = GetProgress::check_model('model_canvas');
        // II. Ārējās vides analīze
        $check[1][] = GetProgress::check_model('model_pest');
        $check[1][] = GetProgress::check_model('model_circle');
        $check[1][] = GetProgress::check_model('model_forces');
        $check[1][] = GetProgress::check_model('model_barriers');
        $check[1][] = GetProgress::check_model('model_success');
        $check[1][] = GetProgress::check_model('model_competitors');
        $check[1][] = GetProgress::check_model('model_capabilities');
        // III. Iekšējas vides analīze
        $check[2][] = GetProgress::check_model('model_resources');
        $check[2][] = GetProgress::check_model('model_abilities');
        $check[2][] = GetProgress::check_model('model_contribution');
        $check[2][] = GetProgress::check_model('model_suggestions');
        // IV. SVID analīze
        $check[3][] = GetProgress::check_model('svid_table_1');
        $check[3][] = GetProgress::check_model('svid_table_2');
        $check[3][] = GetProgress::check_model('svid_tows');
        // V. IFE EFE IE
        $check[4][] = GetProgress::check_model('model_ife');
        $check[4][] = GetProgress::check_model('model_efe');
        $check[4][] = GetProgress::check_ie();
        // VI. Attīstības stratēģijas izstrāde
        $check[5][] = GetProgress::check_model('model_prieksrocibas');
        $check[5][] = GetProgress::check_model('model_virziens');
        $check[5][] = GetProgress::check_model('model_lidzekli');
        $check[5][] = GetProgress::check_model('strategija_merki');
        // VII. Stratēģijas realizācijas iespējas
        $check[6][] = GetProgress::check_model('model_skoulz');
        $check[6][] = GetProgress::check_model('model_rumelt');
        $check[6][] = GetProgress::check_model('model_grant');


        $check_user_type = Auth::user()->type;
        if($check_user_type == 'pro' or $check_user_type == 'admin')
        {
            $view = 'BA.full_progress_map';
        }
        else
        {
            $view = 'BA.full_progress_map_trial';
        }

        return view($view,[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            //
            'selected_firm_name' => $selected_firm_name,
            //
            'ii' => 7,
            'catt' => $catt,
            'subb_trial' => $subb_trial,
            'subb_pro' => $subb_pro,
            //
            'check' => $check,
        ]);
    }

// ==============================

    public function full_progress_map_destroy($id)
    {
        $get_key_word = DB::table('category_sub')
            ->select('key_word')
            ->where('id', $id)
            ->first();
        $key_word = $get_key_word->key_word;

        // PEST
        if($key_word == 'x-pest')
        {
            $table_name = 'pest';
        }

        // SVID
        elseif($key_word == 'x-svid-1')
        {
            $table_name = 'svid_table_1';
        }
        elseif($key_word == 'x-svid-2')
        {
            $table_name = 'svid_table_2';
        }
        elseif($key_word == 'x-tows')
        {
            $table_name = 'svid_tows';
        }

        // STRATEGY
        elseif($key_word == 'ss-merki')
        {
            $table_name = 'strategija_merki';
        }

        // ALL MODELS
        else
        {
            $table_name = 'model_'.$key_word;
        }


        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        // Удаляем элемент
        DB::table($table_name)
            ->where('firm_name', $selected_firm_id)
            ->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('full-progress-map')->with('success','Модель очищенна');
    }


}
