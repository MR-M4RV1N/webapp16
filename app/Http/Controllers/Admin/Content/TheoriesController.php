<?php
/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 17.05.2018
 * Time: 12:37
 */

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Theory;

class TheoriesController extends Controller
{
    /*... LIST ...*/
    public function page_theories_list()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "content->theories";
        $page_breadcrumbs = array(
            "Console" => "/admin",
        );

        //--- Для контента
        $theories = Theory::all();

        //--- Передаем в вид
        return view('Admin.Content.page_theories_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'theories' => $theories,
        ]);
    }
    /*...*/


    /*... SHOW ...*/
    public function page_theories_show($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "show";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->theories" => "/admin/page_theories_list",
        );

        //--- Для контента
        $theories = Theory::where('id', $id)->get();

        //--- Передаем в вид
        return view('Admin.Content.page_theories_show',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'theories' => $theories[0],
        ]);
    }
    /*...*/

    /*... CREATE ...*/
    public function page_theories_create()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "create";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->theories" => "/admin/page_theories_list",
        );

        //--- Для контента


        //--- Передаем в вид
        return view('Admin.Content.page_theories_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента

        ]);
    }

    public function page_theories_store(Request $request)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        
        /*... ЧАСТЬ 2 ...*/
        // Подготавливаем переменные
        $user = Auth::user()->name;
        $category = "Temp category";
        $tags = "tag1, tag2, tag3";
        // Сохранение в БД
        $item = new Theory;
        $item->title = $data['title'];
        $item->author = $user;
        $item->category = $category;
        $item->tags = $tags;
        $item->description = $data['description'];
        $item->text = $data['text'];
        $item->save();

        /*... ЧАСТЬ 3 ...*/
        return redirect()->route('page-theories-list')->with('success','Стратагема добвалена');
    }
    /*...*/


    /*... EDIT ...*/
    public function page_theories_edit($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "edit";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->theories" => "/admin/page_theories_list",
        );

        //--- Для контента
        $item = Theory::where('id', $id)->first();

        //--- Передаем в вид
        return view('Admin.Content.page_theories_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_theories_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        $item = Theory::find($id);
        $item->title = $data['title'];
        $item->description = $data['description'];
        $item->text = $data['text'];
        $item->save();

        /*... ЧАСТЬ 3 ...*/
        return redirect()->route('page-theories-list')->with('success','Элемент обновлен');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_theories_destroy($id)
    {
        //--- Удаляем запись
        Theory::destroy($id);

        //--- Передаем в вид
        return redirect()->route('page-theories-list')->with('success','Элемент удален');
    }
    /*...*/

}