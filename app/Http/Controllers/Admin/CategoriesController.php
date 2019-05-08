<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Category;
use DB;

class CategoriesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index() {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "content->strategy";
        $page_breadcrumbs = array(
            "Console" => "/admin",
        );

        // Список категорий
        $categories = DB::table('category')->select('id', 'name')->get();

        // Это нужно что бы видеть сколько подкатегорий в каждой категории
        $counted_cat = DB::table('category')->select('id')->get();
        foreach ($counted_cat as $c) {
            $counted_sub[] = DB::table('category_sub')->where('cat_id', $c->id)->count();
        }
        //---
        return view('Admin.Categories.index',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'categories' => $categories,
            'counted_sub'=> $counted_sub,
        ]);
    }

    //---

    public function edit($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "edit";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->strategy" => "/admin/page_categories_strategy_index",
        );

        // ---
        $category_record_result = DB::table('category')->select('id', 'name', 'text')->where('id', $id)->get();
        $category_record_string = $category_record_result[0];
        // -------------------------
        //dump($category_record_string);
        //echo($category_record_string->id);
        return view('Admin.Categories.edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category_record_string' => $category_record_string
        ]);
    }

    public function update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $category_name = $data['category_name'];
        $category_text = $data['category_text'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('category')
            ->where('id', $id)
            ->update([
                'name' => $category_name,
                'text' => $category_text
            ]);

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('page-categories-strategy-index')->with('success','Категория обновленна');
        /*...*/
    }

    //---

    public function create()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "create";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->strategy" => "/admin/page_categories_strategy_index",
        );

        return view('Admin.Categories.create', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
        ]);
    }

    public function store(Request $request)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $new_category_name = $data['name'];
        $category_text = $data['category_text'];

        /*... Часть 2 ...*/
        // Сохранение в БД
        DB::table('category')->insert([
            'name' => $new_category_name,
            'text' => $category_text
        ]);

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('page-categories-strategy-index')->with('success','Категория добавленна');
        /*...*/
    }

    //---

    public function destroy($id)
    {

        DB::table('category')->where('id', $id)->delete();

        /*====================================================================================================*/
        /* Перенаправляем на главную страницу с сообщением */
        /*...*/
        return redirect()->route('page-categories-strategy-index')->with('success','Категория удалена');
        /*...*/
    }
}
