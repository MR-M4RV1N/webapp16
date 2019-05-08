<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetProgress;
use App\Http\Controllers\PRO\Description\FirmController;

class PageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_profile()
    {
        //---
        $catt = DB::table('category')->select('id', 'name')->get();
        $page_title = "Page Main";

        return view('BA.page_profile',[
            'catt' => $catt,
            'page_title' => $page_title,
        ]);
    }


    public function page_firms()
    {
        $page_sidebar = "strategy";
        $page_title = "Stratēģijas izstrāde";
        $page_breadcrumbs = null;

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        if($selected_firm_name == null) {$not_selected = true;} else {$not_selected = false;}
        //--- Для контента
        // -1- Получаем документ (фирму)
        $user_id = Auth::user()->id;
        $user_firm_result = DB::table('user_firms')->where('user_id', $user_id)->get();

        if(isset($user_firm_result[0]))
        {
            // -2-
            $selected_view_type = GetSelectedFirm::view_type();
            if($selected_view_type == null)
            {
                $selected_view_type = 2;
            }

            // -3- Определяем прогресс документа
            // Сколько моделей было заполненно
            $progress_description = GetProgress::total_description();
            $progress_external_environment = GetProgress::total_external_environment();
            $progress_internal_environment = GetProgress::total_internal_environment();
            $progress_swot = GetProgress::total_swot();
            $progress_ie = GetProgress::total_ie();
            $progress_strategy = GetProgress::total_strategy();
            $progress_tests = GetProgress::total_tests();
            // Общий процесс
            $progress_progress = GetProgress::total_progress();

            // -4- Определяем уровень доступа пользователя
            // Получаем название типа пользователя
            $user_type = Auth::user()->type;
            // Условие для названий типа
            if($user_type == 'pro' or $user_type == 'admin')
            {
                $view = 'BA.page_firms';
            }
            else
            {
                $view = 'BA.page_firms_trial';
            }

            return view($view, [
                'page_sidebar' => $page_sidebar,
                'page_title' => $page_title,
                'page_breadcrumbs' => $page_breadcrumbs,
                'not_selected' => $not_selected,
                'selected_firm_name' => $selected_firm_name,
                'user_firm_result' => $user_firm_result,
                'selected_view_type' => $selected_view_type,
                'progress_description' => $progress_description,
                'progress_external_environment' => $progress_external_environment,
                'progress_internal_environment' => $progress_internal_environment,
                'progress_swot' => $progress_swot,
                'progress_strategy' => $progress_strategy,
                'progress_tests' => $progress_tests,
                'progress_progress' => $progress_progress,
            ]);
        }
        else
        {
            return view('BA.page_firms_trial'   , [
                'page_sidebar' => $page_sidebar,
                'page_title' => $page_title,
                'page_breadcrumbs' => $page_breadcrumbs,
                'not_selected' => $not_selected,
                'selected_firm_name' => $selected_firm_name,
                'user_firm_result' => $user_firm_result,
            ]);
        }
    }


    public function view_type_update($type)
    {
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        // -- Обновляем информацию в БД
        DB::table('user_firms')
            ->where('id', $selected_firm_id)
            ->update([
                'view_type' => $type,
            ]);

        return redirect()->route('page-firms');

    }


    public function page_all_firms()
    {
        $page_sidebar = "strategy";
        $page_title = "Uzņēmumu redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
        );

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        if($selected_firm_name == null) {$not_selected = true;} else {$not_selected = false;}
        //--- Для контента
        $user_id = Auth::user()->id;
        $user_firm_result = DB::table('user_firms')
            ->where('user_id', $user_id)
            ->get();

        return view('BA.page_all_firms',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'user_firm_result' => $user_firm_result,
            'not_selected' => $not_selected,
            'selected_firm_name' => $selected_firm_name,
        ]);
    }



    public function select_selected_firm()
    {
        $page_sidebar = "strategy";
        $page_title = "Izvēlēties citu uzņēmumu";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
        );

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $user_id = Auth::user()->id;
        $user_firm_result = DB::table('user_firms')->where('user_id', $user_id)->get();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        return view('BA.select_selected_firm',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,
            'user_firm_result' => $user_firm_result,
            'selected_firm_id' => $selected_firm_id,
        ]);
    }


    public function selected_firms_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_firm = $data['selected_firm'];
        $user = Auth::user()->name;

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        $find_record_result = DB::table('user_selected_firm')->where('user', $user)->get();
        $find_record_arr = $find_record_result->toArray();
        if ($find_record_arr == null)
        {
            DB::table('user_selected_firm')
                ->insert([
                    'user' => $user,
                    'selected_firm' => $selected_firm
                ]);

            return redirect()->route('page-firms')->with('success','Запись с выбранной фирмой добавлена');
        }
        else
        {
            DB::table('user_selected_firm')
                ->where('user', $user)
                ->update([
                    'user' => $user,
                    'selected_firm' => $selected_firm
                ]);

            return redirect()->route('page-firms')->with('success','Выбранная фирма изменена');
        }


    }



    public function page_canvas()
    {
        $page_title = "Page Main";
        // Для treview
        $catt = DB::table('category_canvas')->get();


        return view('BA.page_canvas',[
            'page_title' => $page_title,
            'catt' => $catt,
        ]);
    }


    public function page_canvas_cat($cat)
    {
        $page_title = "Page Main";
        // Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        return view('BA.page_canvas',[
            'page_title' => $page_title,
            'catt' => $catt,
            'subb' => $subb,
            'cat' => $cat
        ]);
    }



    public function page_canvas_table($cat)
    {
        $page_title = "Page Main";
        //--- Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //--- Для контента


        return view('BA.page_canvas_table',[
            'page_title' => $page_title,
            'cat' => $cat,
            'catt' => $catt,
            'subb' => $subb,
            // Для контента

        ]);
    }


    public function page_models_cat($cat)
    {
        $page_sidebar = "models";
        $page_title = DB::table('category_models')
            ->where('id', $cat)
            ->first();
        $page_breadcrumbs = [
            "Модели" => "/page_models"
        ];
        // Для treview
        $catt = DB::table('category_models')->get();
        $subb_1 = DB::table('category_models_sub')
            ->where('cat_id', $cat)
            ->where('type', 1)
            ->get();
        $subb_2 = DB::table('category_models_sub')
            ->where('cat_id', $cat)
            ->where('type', 2)
            ->get();

        return view('BA.page_models_1',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title->name,
            'page_breadcrumbs' => $page_breadcrumbs,
            'catt' => $catt,
            'subb_1' => $subb_1,
            'subb_2' => $subb_2,
            'cat' => $cat
        ]);
    }


    public function page_main()
    {
        //---
        $catt = DB::table('category')->select('id', 'name')->get();
        $page_title = "Page Main";

        return view('BA.page_main',[
            'catt' => $catt,
            'page_title' => $page_title,
        ]);
    }


    public function page_models()
    {
        $page_sidebar = "models";
        $page_title = "Модели";
        $page_breadcrumbs = null;
        //---
        $catt = DB::table('category_models')->select('id', 'name')->get();

        return view('BA.page_models',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'catt' => $catt,
        ]);
    }





    public function page_1($cat)
    {
        //--- Для treeview
        $catt = DB::table('category')->select('id', 'name', 'text')->get();
        $page_title = "Page_1";

        //---
        $catt_text = $catt[0]->text;

        $subb = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $cat)->get();



        return view('BA.page_1',[
            'catt' => $catt,
            'catt_text' => $catt_text,
            'page_title' => $page_title,
            'cat' => $cat,
            'subb' =>$subb,
        ]);
    }

    public function page_1_1($cat, $sub)
    {
        //--- Для treeview
        $catt = DB::table('category')->select('id', 'name', 'text')->get();
        $page_title = "Page_1_1";
        $subb = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id', $cat)->get();
        //---
        $subb_text_result = DB::table('category_sub')->select('id', 'name', 'text')->where('id', $sub)->get();
        $subb_text = $subb_text_result[0]->text;

        return view('BA.page_1_1',[
            'catt' => $catt,
            'subb_text' => $subb_text,
            'page_title' => $page_title,
            'cat' => $cat,
            'subb' =>$subb,
        ]);
    }



    public function get_pro_statuss()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "Saņemt PRO statusu";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "page_firms",
            "Pilna progresa karte" => "full_progress_map",
        );


        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $catt = DB::table('category')->select('id', 'name', 'text')->get();


        return view('BA.get_pro_statuss',[
            // Title
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Menu
            'selected_firm_name' => $selected_firm_name,
            // Kontent
            'catt' => $catt,
        ]);
    }


    public function credit_card_form()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "Credit Card";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Saņemt PRO statusu" => "/get_pro_statuss",
        );


        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента


        return view('BA.credit_card_form',[
            // Title
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Menu
            'selected_firm_name' => $selected_firm_name,
            // Kontent

        ]);
    }

// ==============================


    public function downloadAll()
    {
        //
    }
}
