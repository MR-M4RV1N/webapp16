<?php

namespace App\Http\Controllers\PRO\Internal_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class AbilitiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... LIST ...*/
    public function page_abilities_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Spēju analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'abilities')
            ->first();

        $item = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->get();




        return view('PRO.Internal_environment.page_abilities_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'table_models_text' => $table_models_text,
            'selected_firm_name' => $selected_firm_name,
            'item' => $item,
        ]);
    }
    /*...*/


    /*... MANAGE ...*/
    public function page_abilities_manage()
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
        );

        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $item = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->get();


        return view('PRO.Internal_environment.page_abilities_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }
    /*...*/

//--------------------------------------------------

    /*... EDIT ...*/
    public function page_abilities_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
            "Redaktors" => "/my_page/page_abilities_manage",
        );

        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $item = DB::table('model_abilities')
            ->where('id', $id)
            ->get();

        return view('PRO.Internal_environment.page_abilities_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'id' => $id,
            // Для контента
            'item' => $item,
        ]);
    }
    /*...*/

    /*... UPDATE...*/
    public function page_abilities_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $key_ability = $data['key_ability'];
        $durability = $data['durability'];
        $item_transparence = $data['transparence'];
        $item_mobility = $data['mobility'];
        $item_repeatability = $data['repeatability'];

        /*... ЧАСТЬ 2 ...*/
        // Обновляем информацию в БД
        DB::table('model_abilities')
            ->where('id', $id)
            ->update([
                'key_ability' => $key_ability,
                'durability' => $durability,
                'transparence' => $item_transparence,
                'mobility' => $item_mobility,
                'repeatability' => $item_repeatability,
            ]);

        /*... ЧАСТЬ 3 ...*/
        // Передаем в вид
        return redirect()->route('page-abilities-manage')->with('success','Strategija atjaunota');
    }
    /*...*/



    /*... CREATE ...*/
    public function page_abilities_create()
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
            "Redaktors" => "/my_page/page_abilities_manage",
        );

        //--- Для контента


        return view('PRO.Internal_environment.page_abilities_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            // Для контента

        ]);
    }
    /*...*/

    /*... STORE ...*/
    public function page_abilities_store(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $key_ability = $data['key_ability'];
        $durability = $data['durability'];
        $item_transparence = $data['transparence'];
        $item_mobility = $data['mobility'];
        $item_repeatability = $data['repeatability'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Обновляем информацию в БД
        DB::table('model_abilities')
            ->insert([
                'key_ability' => $key_ability,
                'durability' => $durability,
                'transparence' => $item_transparence,
                'mobility' => $item_mobility,
                'repeatability' => $item_repeatability,
                'firm_name' => $selected_firm,
            ]);

        /*... ЧАСТЬ 4 ...*/
        // Передаем в вид
        return redirect()->route('page-abilities-manage')->with('success','Created!');
    }
    /*...*/

// ==================================================

    /*... DELETE ...*/
    public function page_abilities_destroy($id)
    {
        // Удаляем элемент
        DB::table('model_abilities')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-abilities-manage')->with('success','Deleted!');
    }
    /*...*/


}
