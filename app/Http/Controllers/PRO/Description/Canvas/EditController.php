<?php

namespace App\Http\Controllers\PRO\Description\Canvas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... EDIT ...*/
    public function page_canvas_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Business Model" => "/my_page/page_canvas_list",
            "Redaktors" => "/my_page/page_canvas_manage/".$category,
        );
        //--- Для контента
        $item = DB::table('model_canvas')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Description.Canvas.page_canvas_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_canvas_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_canvas')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_canvas')
            ->where('id', $id)
            ->select('category')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-canvas-manage', ['category' => $category->category])->with('success','Элемент обновлен');
    }
    /*...*/

}