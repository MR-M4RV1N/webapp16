<?php

namespace App\Http\Controllers\PRO\Svid\Iekseja;

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


    public function svid_iekseja_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - iekšējā vide" => "/my_page/svid_iekseja_list",
            "Redaktors" => "/my_page/svid_iekseja_edit/".$category,
        );

        //--- Для контента (BA/PRO.Svid/svid_iekseja_crud_edit.blade.php)
        $svid_item_result = DB::table('svid_table_1')
            ->where('id', $id)
            ->select('item')
            ->get();
        $svid_item_arr = $svid_item_result->toArray();
        $svid_item_item = $svid_item_arr[0]->item;

        return view('PRO.Svid.Iekseja.svid_iekseja_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category' => $category,
            'svid_item_id' => $id,
            'svid_item_item' => $svid_item_item
        ]);
    }

    public function svid_iekseja_update(Request $request, $category, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $svid_db_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('svid_table_1')
            ->where('id', $id)
            ->update([
                'item' => $svid_db_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('svid-iekseja-manage', ['category' => $category])->with('success','Элемент обновлен');
    }

}
