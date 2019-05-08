<?php

namespace App\Http\Controllers\PRO\Internal_environment\Suggestions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... EDIT ...*/
    public function page_suggestions_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Priekšlikumi - iekšējā vide" => "/my_page/page_suggestions_list",
            "Redaktors" => "/my_page/page_suggestions_manage/1",
        );

        //--- Для контента
        $item = DB::table('model_suggestions')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Internal_environment.Suggestions.page_suggestions_edit',[
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

}