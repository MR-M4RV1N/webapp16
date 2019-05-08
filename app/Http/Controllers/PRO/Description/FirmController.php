<?php

namespace App\Http\Controllers\PRO\Description;

use Illuminate\Http\Request;
use DB;
use App\Http\Controllers\Controller;
use App\Http\MyFunctions\GetSelectedFirm;


class FirmController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ ...*/
    public function firm_description_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Apraksts";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $firm_description_result = DB::table('model_description')
            ->where('firm_name', $selected_firm_id)
            ->get();

        return view('PRO.Description.firm_description_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'firm_description_result' => $firm_description_result
        ]);
    }



    /*... FIRST_CREATE ...*/
    public function page_description_first_create()
    {
        $page_sidebar = "strategy";
        $page_title = "Apraksts";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        /*... Код для контента ...*/


        return view('PRO.Description.page_description_first_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента

        ]);
    }
    /*...*/

    /*... FIRST_STORE ...*/
    public function page_description_first_store(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // -- Данным из POST-а присваеваем переменную
        $data = $request->all();
        // -- Выбираем строчку и присваеваем переменную
        $firm_name = $data['firm_name'];
        $firm_description = $data['firm_description'];

        /*... ЧАСТЬ 2 - Получаем информацию о выбранной фирме ...*/
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 - Заносим данные ...*/
        // -- Добавляем название конкурента и выбранную для редактирования фирму
        DB::table('model_description')
            ->insert([
                'name' => $firm_name,
                'description' => $firm_description,
                'firm_name' => $selected_firm_id
            ]);


        /*... Передаем в вид ...*/
        return redirect()->route('firm-description-list')->with('success','My firm created!');
    }
    /*...*/

    /*... EDIT ...*/
    public function firm_description_crud_edit()
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $firm_description_result = DB::table('model_description')
            ->where('firm_name', $selected_firm_id)
            ->first();

        return view('PRO.Description.firm_description_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'firm_description_result' => $firm_description_result,
        ]);
    }


    /*... UPDATE ...*/
    public function firm_description_crud_update(Request $request)
    {
        $page_sidebar = "strategy";
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $firm_name = $data['firm_name'];
        $firm_description = $data['firm_description'];
        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_description')
            ->where('firm_name', $selected_firm_id)
            ->update([
                'name' => $firm_name,
                'description' => $firm_description,
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('firm-description-list')->with('success','Informācija atjaunota');
    }


// ==============================

    use \App\Http\MyTraits\Word\GetDescriptionWord;


}
