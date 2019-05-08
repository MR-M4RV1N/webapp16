<?php

namespace App\Http\Controllers\PRO\Svid\Areja;

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


    public function svid_areja_manage($category)
    {
        $page_title = "Redaktors";
        $page_sidebar = "strategy";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "SVID - TOWS analīze" => "/my_page/svid_areja_list",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_areja_edit.blade.php)
        if($category == 'I')
        {
            $title_1 = 'IESPĒJAS';
        }

        if($category == 'D')
        {
            $title_1 = 'DRAUDI';
        }

        //--- Для Вкладок
        $manage_link = 'svid_areja_manage';
        $theory_link = 'svid_areja_theory';
        $example_link = 'svid_areja_example';

        // Контент
        $svid_content = DB::table('svid_table_2')
            ->select('id', 'item')
            ->where('firm_name', $selected_firm)
            ->where('category', $category)
            ->get();

        return view('PRO.Svid.Areja.svid_areja_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'title_1' => $title_1,
            'svid_content' => $svid_content
        ]);
    }

    public function svid_areja_store(Request $request, $category)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $svid_areja_db_item = $data['item'];
        $svid_areja_db_category = $category;

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Часть 3 ...*/
        // Сохранение в БД
        DB::table('svid_table_2')->insert([
            'category' => $svid_areja_db_category,
            'item' => $svid_areja_db_item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('svid-areja-manage', ['category' => $category])->with('success','Элемент добвален');
    }

    public function svid_areja_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('svid_table_2')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('svid-areja-manage', ['category' => $category])->with('success','Элемент удален');
    }

}
