<?php

namespace App\Http\Controllers\Canvas\Strategy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class FaktorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... Факторы ...*/
    public function factors($cat)
    {
        $page_title = "Page Main";
        //--- Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Контент
        $content = DB::table('canvas_strategy')
            ->where('firm_name', $selected_firm)
            ->get();

        return view('BA.Canvas.Strategy.factors',[
            'page_title' => $page_title,
            'cat' => $cat,
            'catt' => $catt,
            'subb' => $subb,
            'content' => $content,
            ]);
    }

    public function factors_show($cat, $id)
    {
        $page_title = "Page Main";
        //--- Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //--- Контент
        $content_res = DB::table('canvas_strategy')->where('id', $id)->get();
        $content = $content_res[0];

        return view('BA.Canvas.Strategy.factors_show',[
            'page_title' => $page_title,
            'cat' => $cat,
            'catt' => $catt,
            'subb' => $subb,
            'content' => $content,
        ]);
    }


    public function factors_create($cat)
    {
        $page_title = "Page Main";
        //--- Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //--- Контент

        return view('BA.Canvas.Strategy.factors_create',[
            'page_title' => $page_title,
            'cat' => $cat,
            'catt' => $catt,
            'subb' => $subb,
        ]);
    }


    public function factors_store(Request $request, $cat)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $content_item = $data['content'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Часть 3 ...*/
        // Сохранение в БД
        DB::table('canvas_strategy')
            ->insert([
                'cat' => 'faktors',
                'content' => $content_item,
                'firm_name' => $selected_firm
            ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-canvas-strategy-factors', ['cat' => $cat])->with('success','Элемент добвален');
    }



    public function factors_edit($cat, $id)
    {
        $page_title = "Page Main";
        //--- Для treview
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //--- Контент
        $content_res = DB::table('canvas_strategy')->where('id', $id)->get();
        $content = $content_res[0];

        return view('BA.Canvas.Strategy.factors_edit',[
            'page_title' => $page_title,
            'cat' => $cat,
            'catt' => $catt,
            'subb' => $subb,
            'content' => $content,
        ]);
    }


    public function factors_update(Request $request, $cat, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $content_item = $data['content'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('canvas_strategy')
            ->where('id', $id)
            ->update([
                'content' => $content_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('page-canvas-strategy-factors', ['cat' => $cat])->with('success','Элемент обновлен');
    }


    public function factors_destroy($cat, $id)
    {
        // Удаляем элемент
        DB::table('canvas_strategy')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-canvas-strategy-factors', ['cat' => $cat])->with('success','Элемент удален');
    }


    /*... Оценка ...*/
    public function estimate($cat)
    {

    }


    /*... Голубой океан ...*/
    public function ocean($cat)
    {

    }


    /*... Множественные модели ...*/
    public function multi($cat)
    {

    }
}
