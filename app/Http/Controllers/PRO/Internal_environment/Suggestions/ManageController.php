<?php

namespace App\Http\Controllers\PRO\Internal_environment\Suggestions;

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
    public function page_suggestions_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Priekšlikumi - iekšējā vide" => "/my_page/page_suggestions_list",
        );

        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Stiprās puses:";
        }
        if($category == 2)
        {
            $table_title = "Vajās puses:";
        }

        //--- Для Вкладок
        $manage_link = 'page_suggestions_manage';
        $theory_link = 'page_suggestions_theory';
        $example_link = 'page_suggestions_example';

        //--- Для контента
        $item = DB::table('model_suggestions')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.Suggestions.page_suggestions_manage',[
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


    public function page_suggestions_store(Request $request, $category)
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
        DB::table('model_suggestions')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-suggestions-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_suggestions_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_suggestions')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-suggestions-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}