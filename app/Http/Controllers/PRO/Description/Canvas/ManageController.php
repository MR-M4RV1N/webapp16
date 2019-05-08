<?php

namespace App\Http\Controllers\PRO\Description\Canvas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function page_canvas_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Business Model" => "/my_page/page_canvas_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        
        if($category == 'kp') { $table_title = "Galvenie partneri"; }
        if($category == 'kd') { $table_title = "Galvenās aktivitātes"; }
        if($category == 'kr') { $table_title = "Galvenie resursi"; }
        if($category == 'cp') { $table_title = "Vērtigie piedavājumi"; }
        if($category == 'vk') { $table_title = "Attiecības ar klientiem"; }
        if($category == 'ks') { $table_title = "Noietas kanali"; }
        if($category == 'ps') { $table_title = "Pateretāju segmenti"; }
        if($category == 'si') { $table_title = "Izdevumu struktūra"; }
        if($category == 'pd') { $table_title = "Ienākumu struktūra"; }

        //--- Для Вкладок
        $manage_link = 'page_canvas_manage';
        $theory_link = 'page_canvas_theory';
        $example_link = 'page_canvas_example';
        
        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $firm_canvas_result = DB::table('model_canvas')
            ->select('id', 'item')
            ->where('category', $category)
            ->where('firm_name', $selected_firm_id)
            ->get();

        $item = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Description.Canvas.page_canvas_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'item' => $item,
            'table_title' => $table_title,
        ]);
    }

    public function page_canvas_store(Request $request, $category)
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
        DB::table('model_canvas')->insert([
            'category' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-canvas-manage', $category)->with('success','Элемент добвален');
    }

    public function page_canvas_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_canvas')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-canvas-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}