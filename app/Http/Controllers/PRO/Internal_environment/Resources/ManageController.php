<?php

namespace App\Http\Controllers\PRO\Internal_environment\Resources;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function page_resources_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Resursu analīze" => "/my_page/page_resources_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Finansiālie resursi:";
        }
        if($category == 2)
        {
            $table_title = "Fiziskie resursi:";
        }
        if($category == 3)
        {
            $table_title = "Tehnologiskie resursi:";
        }
        if($category == 4)
        {
            $table_title = "Reputācija:";
        }
        if($category == 5)
        {
            $table_title = "Iemaņas un zināšanas:";
        }
        if($category == 6)
        {
            $table_title = "Mijiedarbības spēja:";
        }
        if($category == 7)
        {
            $table_title = "Motivācija:";
        }

        //--- Для Вкладок
        $manage_link = 'page_resources_manage';
        $theory_link = 'page_resources_theory';
        $example_link = 'page_resources_example';

        //--- Для контента
        $item = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.Resources.page_resources_manage',[
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


    public function page_resources_store(Request $request, $category)
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
        DB::table('model_resources')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-resources-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_resources_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_resources')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-resources-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}
