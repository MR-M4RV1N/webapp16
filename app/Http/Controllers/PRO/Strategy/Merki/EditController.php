<?php

namespace App\Http\Controllers\PRO\Strategy\Merki;

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
    public function strategija_merki_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Mērķi" => "/my_page/strategija_merki_list",
            "Redaktors" => "/my_page/strategija_merki_manage/".$category,
        );

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('id', $id)
            ->get();

        return view('PRO.Strategy.Merki.strategija_merki_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            'id' => $id,
            // Для контента
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }

    /*... UPDATE ...*/
    public function strategija_merki_update(Request $request, $category, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $item_merkis = $data['merkis'];
        $item_darbibas = $data['darbibas'];
        $item_izpilditajs = $data['izpilditajs'];
        $item_laiks = $data['laiks'];
        $item_izmaksas = $data['izmaksas'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('strategija_merki')
            ->where('id', $id)
            ->update([
                'merkis' => $item_merkis,
                'darbibas' => $item_darbibas,
                'izpilditajs' => $item_izpilditajs,
                'laiks' => $item_laiks,
                'izmaksas' => $item_izmaksas,
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('strategija-merki-manage', $category)->with('success','PRO.Strategy atjaunota');
    }


}
