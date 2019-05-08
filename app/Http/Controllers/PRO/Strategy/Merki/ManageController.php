<?php

namespace App\Http\Controllers\PRO\Strategy\Merki;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function strategija_merki_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Stratēģiskie mērķi" => "/my_page/strategija_merki_list",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для Вкладок
        $manage_link = 'strategija_merki_manage';
        $theory_link = 'strategija_merki_theory';
        $example_link = 'strategija_merki_example';

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('firm_name', $selected_firm)
            ->get();

        return view('PRO.Strategy.Merki.strategija_merki_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }



    /*... STORE ...*/
    public function strategija_merki_store(Request $request, $category)
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
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        //Обновляем информацию в БД
        DB::table('strategija_merki')
            ->insert([
                'merkis' => $item_merkis,
                'darbibas' => $item_darbibas,
                'izpilditajs' => $item_izpilditajs,
                'laiks' => $item_laiks,
                'izmaksas' => $item_izmaksas,
                'firm_name' => $selected_firm
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('strategija-merki-manage', $category)->with('success','Strategija pievienota');
    }


    /*... DELETE ...*/
    public function strategija_merki_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('strategija_merki')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('strategija-merki-manage', $category)->with('success','Стратегия удалена');
    }
    /*...*/

}
