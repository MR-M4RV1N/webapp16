<?php

namespace App\Http\Controllers\PRO\Svid\Tows;

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


    public function svid_tows_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "TOWS analīze" => "/my_page/svid_tows_list",
            "Redaktors" => "/my_page/svid_tows_manage/".$category,
        );

        //--- Для контента (BA/PRO.Svid/svid_tows_crud_edit.blade.php)
        $tows_item_result = DB::table('svid_tows')
            ->where('id', $id)
            ->select('strategy')
            ->get();
        $tows_item_arr = $tows_item_result->toArray();
        $tows_item_item = $tows_item_arr[0]->strategy;

        return view('PRO.Svid.Tows.svid_tows_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для контента
            'strategy_cat' => $category,
            'tows_item_id' => $id,
            'tows_item_item' => $tows_item_item
        ]);
    }

    public function svid_tows_update(Request $request, $category, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $tows_db_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('svid_tows')
            ->where('id', $id)
            ->update([
                'strategy' => $tows_db_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('svid-tows-manage', ['strategy_cat' => $category])->with('success','Элемент обновлен');
    }

}
