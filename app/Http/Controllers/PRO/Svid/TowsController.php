<?php

namespace App\Http\Controllers\PRO\Svid;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class TowsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ ...*/
    public function svid_tows_list()
    {
        $page_sidebar = "strategy";
        $page_title = "TOWS analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'x-tows')
            ->first();

        $strategy_si = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'SI')
            ->select('id', 'strategy')
            ->get();
        $strategy_vi = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'VI')
            ->select('id', 'strategy')
            ->get();
        $strategy_sd = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'SD')
            ->select('id', 'strategy')
            ->get();
        $strategy_vd = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', 'VD')
            ->select('id', 'strategy')
            ->get();

        return view('PRO.Svid.svid_tows_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'strategy_si' => $strategy_si,
            'strategy_vi' => $strategy_vi,
            'strategy_sd' => $strategy_sd,
            'strategy_vd' => $strategy_vd
        ]);
    }

    public function svid_tows_edit($strategy_cat)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "TOWS analīze" => "/my_page/svid_tows_list/16",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_tows_edit.blade.php)
        if($strategy_cat == 'SI')
        {
            $title_1 = 'STIPRĀS PUSES';
            $title_2 = 'SI Stratēģijas';
            $title_3 = 'IESPĒJAS';
        }

        if($strategy_cat == 'VI')
        {
            $title_1 = 'VĀJĀS PUSES';
            $title_2 = 'VI Stratēģijas';
            $title_3 = 'IESPĒJAS';
        }

        if($strategy_cat == 'SD')
        {
            $title_1 = 'STIPRĀS PUSES';
            $title_2 = 'SD Stratēģijas';
            $title_3 = 'DRAUDI';
        }

        if($strategy_cat == 'VD')
        {
            $title_1 = 'VĀJĀS PUSES';
            $title_2 = 'VD Stratēģijas';
            $title_3 = 'DRAUDI';
        }

        // Контент
        $strategy_result = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', $strategy_cat)
            ->select('id', 'strategy')
            ->get();


        return view('PRO.Svid.svid_tows_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'strategy_cat' => $strategy_cat,
            'title_1' => $title_1,
            'title_2' => $title_2,
            'title_3' => $title_3,
            'strategy_result' => $strategy_result
        ]);
    }
    /*...*/

//------------------------------

    /*... CREATE ...*/
    public function svid_tows_crud_create($strategy_cat)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "TOWS analīze" => "/my_page/svid_tows_list/16",
            "Redaktors" => "/my_page/svid_tows_edit/16/".$strategy_cat,
        );

        /*... Код для контента ...*/


        return view('PRO.Svid.svid_tows_crud_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'strategy_cat' => $strategy_cat,
        ]);
    }

    public function svid_tows_crud_store(Request $request, $strategy_cat)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $svid_tows_db_item = $data['item'];
        $svid_tows_db_category = $strategy_cat;

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Часть 3 ...*/
        // Сохранение в БД
        DB::table('svid_tows')->insert([
            'category' => $svid_tows_db_category,
            'strategy' => $svid_tows_db_item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('svid_tows_edit', [$strategy_cat])->with('success','Элемент добвален');
    }
    /*...*/

    /*... UPDATE ...*/
    public function svid_tows_crud_edit($strategy_cat, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "TOWS analīze" => "/my_page/svid_tows_list/16",
            "Redaktors" => "/my_page/svid_tows_edit/16/".$strategy_cat,
        );

        //--- Для контента (BA/PRO.Svid/svid_tows_crud_edit.blade.php)
        $tows_item_result = DB::table('svid_tows')
            ->where('id', $id)
            ->select('strategy')
            ->get();
        $tows_item_arr = $tows_item_result->toArray();
        $tows_item_item = $tows_item_arr[0]->strategy;

        return view('PRO.Svid.svid_tows_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'strategy_cat' => $strategy_cat,
            'tows_item_id' => $id,
            'tows_item_item' => $tows_item_item
        ]);
    }

    public function svid_tows_crud_update(Request $request, $strategy_cat, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $tows_db_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('svid_tows')
            ->where('id', $id)
            ->update([
                'strategy' => $tows_db_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('svid_tows_edit', ['strategy_cat' => $strategy_cat])->with('success','Элемент обновлен');
    }
    /*...*/

//==============================

    /*... DELETE ...*/
    public function svid_tows_crud_destroy($strategy_cat, $id)
    {
        // Удаляем элемент
        DB::table('svid_tows')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('svid_tows_edit', [$strategy_cat])->with('success','Элемент удален');
    }
    /*...*/
}
