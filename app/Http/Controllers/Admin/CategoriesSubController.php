<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CategoriesSubController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "sub categories";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->strategy" => "/admin/page_categories_strategy_index",
        );

        // Формируем список подкатегорий в выбранном разделе(категории)
        $categories_sub = DB::table('category_sub')->select('id', 'name')->where('cat_id', $id)->get();

        // Нужно, чтобы создать новую запись. Что бы она знала к какой категории относиться
        $cat = $id;

        return view('Admin.Categories_Sub.index',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'categories_sub' => $categories_sub,
            'cat' => $cat,
        ]);
    }

    //---

    public function edit($id, $cat)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "edit";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->strategy" => "/admin/page_categories_strategy_index",
            "sub categoroes" => "/admin/categories_strategy_sub/index/".$cat,
        );
        // ---
        $category_record_result = DB::table('category_sub')->select('id', 'name', 'route', 'text')->where('id', $id)->get();
        $category_record_string = $category_record_result[0];
        // -------------------------
        return view('Admin.Categories_Sub.edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category_record_string' => $category_record_string,
            'cat' => $cat,
        ]);
    }

    public function update(Request $request, $id, $cat)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $category_sub_name = $data['category_sub_name'];
        $category_sub_route = $data['category_sub_route'];
        $category_sub_text = $data['category_sub_text'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('category_sub')
            ->where('id', $id)
            ->update([
                'name' => $category_sub_name,
                'route' => $category_sub_route,
                'text' => $category_sub_text
            ]);

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('categories-strategy-sub-index', $cat)->with('success','Подкатегория обновленна');
        /*...*/
    }

    //---

    public function create($cat)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "create";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->strategy" => "/admin/page_categories_strategy_index",
            "sub categoroes" => "/admin/categories_strategy_sub/index/".$cat,
        );
        //---
        return view('Admin.Categories_Sub.create', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'cat' => $cat,
        ]);
    }

    public function store(Request $request, $cat)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $new_category_sub_name = $data['sub_cat_name'];
        $new_category_sub_route = $data['sub_cat_route'];
        $new_category_sub_text = $data['sub_cat_text'];

        /*... Часть 2 ...*/
        // Сохранение в БД
        DB::table('category_sub')->insert([
            'name' => $new_category_sub_name,
            'route' => $new_category_sub_route,
            'text' => $new_category_sub_text,
            'cat_id' => $cat,
        ]);

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('categories-strategy-sub-index', $cat)->with('success','Подкатегория добавленна');
        /*...*/
    }

    //---

    public function destroy($id, $cat)
    {

        DB::table('category_sub')->where('id', $id)->delete();

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('categories-strategy-sub-index', $cat)->with('success','Подкатегория удалена');
        /*...*/
    }
}
