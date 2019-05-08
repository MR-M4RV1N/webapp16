<?php

namespace App\Http\Controllers\PRO\Svid\Tows;

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


    public function svid_tows_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "TOWS analīze" => "/my_page/svid_tows_list",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/PRO.Svid/svid_tows_edit.blade.php)
        if($category == 'SI')
        {
            $title_1 = 'STIPRĀS PUSES';
            $title_2 = 'SI Stratēģijas';
            $title_3 = 'IESPĒJAS';
        }

        if($category == 'VI')
        {
            $title_1 = 'VĀJĀS PUSES';
            $title_2 = 'VI Stratēģijas';
            $title_3 = 'IESPĒJAS';
        }

        if($category == 'SD')
        {
            $title_1 = 'STIPRĀS PUSES';
            $title_2 = 'SD Stratēģijas';
            $title_3 = 'DRAUDI';
        }

        if($category == 'VD')
        {
            $title_1 = 'VĀJĀS PUSES';
            $title_2 = 'VD Stratēģijas';
            $title_3 = 'DRAUDI';
        }

        // Контент
        $strategy_result = DB::table('svid_tows')
            ->where('firm_name', $selected_firm)
            ->where('category', $category)
            ->select('id', 'strategy')
            ->get();

        //--- Для Вкладок
        $manage_link = 'svid_tows_manage';
        $theory_link = 'svid_tows_theory';
        $example_link = 'svid_tows_example';


        return view('PRO.Svid.Tows.svid_tows_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'strategy_cat' => $category,
            'title_1' => $title_1,
            'title_2' => $title_2,
            'title_3' => $title_3,
            'strategy_result' => $strategy_result
        ]);
    }

    public function svid_tows_store(Request $request, $category)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $svid_tows_db_item = $data['item'];
        $svid_tows_db_category = $category;

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Часть 3 ...*/
        // Сохранение в БД
        DB::table('svid_tows')->insert([
            'category' => $svid_tows_db_category,
            'strategy' => $svid_tows_db_item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('svid-tows-manage', [$category])->with('success','Элемент добвален');
    }

    public function svid_tows_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('svid_tows')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('svid-tows-manage', ['category' => $category])->with('success','Элемент удален');
    }

}
