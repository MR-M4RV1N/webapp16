<?php

namespace App\Http\Controllers\PRO\Strategy;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;

class MerkiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ ...*/
    public function strategija_merki_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Mērķi";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'ss-merki')
            ->first();
        
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('firm_name', $selected_firm)
            ->get();

        return view('PRO.Strategy.strategija_merki_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }

    /*... EDIT ...*/
    public function strategija_merki_edit()
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Mērķi" => "/my_page/strategija_merki_list",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('firm_name', $selected_firm)
            ->get();

        return view('PRO.Strategy.strategija_merki_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }


//------------------------------


    /*... CREATE ...*/
    public function strategija_merki_crud_create()
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Mērķi" => "/my_page/strategija_merki_list",
            "Redaktors" => "/public/my_page/strategija_merki_edit",
        );

        /*... Код для контента ...*/


        return view('PRO.Strategy.strategija_merki_crud_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента

        ]);
    }

    /*... STORE ...*/
    public function strategija_merki_crud_store(Request $request)
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
        return redirect()->route('strategija_merki_edit')->with('success','PRO.Strategy pievienota');
    }

    /*... EDIT ...*/
    public function strategija_merki_crud_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Mērķi" => "/my_page/strategija_merki_list",
            "Redaktors" => "/public/my_page/strategija_merki_edit",
        );

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $strategija_merki_result = DB::table('strategija_merki')
            ->where('id', $id)
            ->get();

        return view('PRO.Strategy.strategija_merki_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'id' => $id,
            // Для контента
            'strategija_merki_result' => $strategija_merki_result,
        ]);
    }

    /*... UPDATE ...*/
    public function strategija_merki_crud_update(Request $request, $id)
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
        return redirect()->route('strategija_merki_edit')->with('success','PRO.Strategy atjaunota');
    }

//==============================

    /*... DELETE ...*/
    public function strategija_merki_destroy($id)
    {
        // Удаляем элемент
        DB::table('strategija_merki')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('strategija_merki_edit')->with('success','Стратегия удалена');
    }
    /*...*/

}
