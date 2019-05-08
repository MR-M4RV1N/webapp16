<?php

namespace App\Http\Controllers\PRO\Internal_environment\Abilities;

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
    public function page_abilities_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
        );

        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для Вкладок
        $manage_link = 'page_abilities_manage';
        $theory_link = 'page_abilities_theory';
        $example_link = 'page_abilities_example';

        //--- Для контента
        $item = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->get();

        return view('PRO.Internal_environment.Abilities.page_abilities_manage',[
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
        ]);
    }
    /*...*/


    /*... STORE ...*/
    public function page_abilities_store(Request $request, $category)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $key_ability = $data['key_ability'];
        $durability = $data['durability'];
        $item_transparence = $data['transparence'];
        $item_mobility = $data['mobility'];
        $item_repeatability = $data['repeatability'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Обновляем информацию в БД
        DB::table('model_abilities')
            ->insert([
                'key_ability' => $key_ability,
                'durability' => $durability,
                'transparence' => $item_transparence,
                'mobility' => $item_mobility,
                'repeatability' => $item_repeatability,
                'firm_name' => $selected_firm,
            ]);

        /*... ЧАСТЬ 4 ...*/
        // Передаем в вид
        return redirect()->route('page-abilities-manage', $category)->with('success','Created!');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_abilities_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_abilities')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-abilities-manage', $category)->with('success','Deleted!');
    }
    /*...*/


}
