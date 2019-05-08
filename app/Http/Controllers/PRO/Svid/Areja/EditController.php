<?php

namespace App\Http\Controllers\PRO\Svid\Areja;

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


    public function svid_areja_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - ārējā vide" => "/my_page/svid_areja_list/16",
            "Redaktors" => "/my_page/svid_areja_edit/16/".$category,
        );

        //--- Для контента (BA/PRO.Svid/svid_areja_crud_edit.blade.php)
        $svid_item_result = DB::table('svid_table_2')
            ->where('id', $id)
            ->select('item')
            ->get();
        $svid_item_arr = $svid_item_result->toArray();
        $svid_item_item = $svid_item_arr[0]->item;

        return view('PRO.Svid.Areja.svid_areja_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category' => $category,
            'svid_item_id' => $id,
            'svid_item_item' => $svid_item_item
        ]);
    }

    public function svid_areja_update(Request $request, $category, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $svid_db_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('svid_table_2')
            ->where('id', $id)
            ->update([
                'item' => $svid_db_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('svid-areja-manage', ['category' => $category])->with('success','Элемент обновлен');
    }

}
