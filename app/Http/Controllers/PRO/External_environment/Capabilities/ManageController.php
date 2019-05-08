<?php

namespace App\Http\Controllers\PRO\External_environment\Capabilities;

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
    public function page_capabilities_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Priekšlikumi - ārējā vide" => "/my_page/page_capabilities_list",
        );

        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Iespējas:";
        }
        if($category == 2)
        {
            $table_title = "Draudi:";
        }

        //--- Для Вкладок
        $manage_link = 'page_capabilities_manage';
        $theory_link = 'page_capabilities_theory';
        $example_link = 'page_capabilities_example';

        //--- Для контента
        $item = DB::table('model_capabilities')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.Capabilities.page_capabilities_manage',[
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
    /*...*/


    public function page_capabilities_store(Request $request, $category)
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
        DB::table('model_capabilities')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-capabilities-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_capabilities_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_capabilities')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-capabilities-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}