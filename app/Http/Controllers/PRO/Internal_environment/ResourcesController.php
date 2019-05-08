<?php

namespace App\Http\Controllers\PRO\Internal_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class ResourcesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... LIST ...*/
    public function page_resources_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Resursu analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'resources')
            ->first();

        $item1 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $item2 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'item')
            ->get();

        $item3 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 3)
            ->select('id', 'item')
            ->get();

        $item4 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 4)
            ->select('id', 'item')
            ->get();

        $item5 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 5)
            ->select('id', 'item')
            ->get();

        $item6 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 6)
            ->select('id', 'item')
            ->get();

        $item7 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 7)
            ->select('id', 'item')
            ->get();



        return view('PRO.Internal_environment.page_resources_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'selected_firm_name' => $selected_firm_name,

            // Контент
            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'item2' => $item2,
            'item3' => $item3,
            'item4' => $item4,
            'item5' => $item5,
            'item6' => $item6,
            'item7' => $item7,
        ]);
    }
    /*...*/


    /*... MANAGE ...*/
    public function page_resources_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Resursu analīze" => "/my_page/page_resources_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Финансовые ресурсы:";
        }
        if($category == 2)
        {
            $table_title = "Физические ресурсы:";
        }
        if($category == 3)
        {
            $table_title = "Технологические ресурсы:";
        }
        if($category == 4)
        {
            $table_title = "Репутация:";
        }
        if($category == 5)
        {
            $table_title = "Навыки и знания:";
        }
        if($category == 6)
        {
            $table_title = "Способность к взаимодействию:";
        }
        if($category == 7)
        {
            $table_title = "Мотивация:";
        }

        //--- Для контента
        $item = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.page_resources_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'category' => $category,

            // Для контента
            'item' => $item,
            'table_title' => $table_title,
        ]);
    }
    /*...*/

// ------------------------------

    /*... EDIT ...*/
    public function page_resources_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Resursu analīze" => "/my_page/page_resources_list",
            "Redaktors" => "/my_page/page_resources_manage/1",
        );

        //--- Для контента
        $item = DB::table('model_resources')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Internal_environment.page_resources_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_resources_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_resources')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_resources')
            ->where('id', $id)
            ->select('cat')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-resources-manage', ['category' => $category->cat])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... CREATE ...*/
    public function page_resources_create($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Resursu analīze" => "/my_page/page_resources_list",
            "Redaktors" => "/my_page/page_resources_manage/1",
        );

        /*... Код для контента ...*/


        return view('PRO.Internal_environment.page_resources_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            // Для контента
            'category' => $category,
        ]);
    }

    public function page_resources_store(Request $request, $category)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Часть 3 ...*/
        // Сохранение в БД
        DB::table('model_resources')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-resources-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


// ==============================


    /*... DELETE ...*/
    public function page_resources_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_resources')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-resources-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}
