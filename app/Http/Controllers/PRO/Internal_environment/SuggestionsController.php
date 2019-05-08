<?php

namespace App\Http\Controllers\PRO\Internal_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class SuggestionsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... LIST ...*/
    public function page_suggestions_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Ierosinājumi";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'suggestions')
            ->first();

        $item1 = DB::table('model_suggestions')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $item2 = DB::table('model_suggestions')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.page_suggestions_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,

            'selected_firm_name' => $selected_firm_name,

            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'item2' => $item2,
        ]);
    }
    /*...*/


    /*... MANAGE ...*/
    public function page_suggestions_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ierosinājumi" => "/my_page/page_suggestions_list",
        );

        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Iespējas:";
        }
        if($category == 2)
        {
            $table_title = "Draudi:";
        }

        //--- Для контента
        $item = DB::table('model_suggestions')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.page_suggestions_manage',[
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
    public function page_suggestions_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ierosinājumi" => "/my_page/page_suggestions_list",
            "Redaktors" => "/my_page/page_suggestions_manage/1",
        );

        //--- Для контента
        $item = DB::table('model_suggestions')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Internal_environment.page_suggestions_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_suggestions_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_suggestions')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_suggestions')
            ->where('id', $id)
            ->select('cat')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-suggestions-manage', ['category' => $category->cat])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... CREATE ...*/
    public function page_suggestions_create($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ierosinājumi" => "/my_page/page_suggestions_list/",
            "Redaktors" => "/my_page/page_suggestions_manage/1",
        );
        //--- Для treeview (partials/blocks_test/treeview.blade.php)
        $catt = DB::table('category')->select('id', 'name', 'text')->get();
        $subb = DB::table('category_sub')->select('id', 'name', 'route')->where('cat_id')->get();

        /*... Код для контента ...*/


        return view('PRO.Internal_environment.page_suggestions_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category' => $category,
        ]);
    }

    public function page_suggestions_store(Request $request, $category)
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
        DB::table('model_suggestions')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-suggestions-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


// ==============================


    /*... DELETE ...*/
    public function page_suggestions_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_suggestions')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-suggestions-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}