<?php

namespace App\Http\Controllers\PRO\Internal_environment\Abilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... EDIT ...*/
    public function page_abilities_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Spēju analīze" => "/my_page/page_abilities_list",
            "Redaktors" => "/my_page/page_abilities_manage/.$category,",
        );

        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $item = DB::table('model_abilities')
            ->where('id', $id)
            ->get();

        return view('PRO.Internal_environment.Abilities.page_abilities_edit', [
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'id' => $id,
            'category' => $category,
            // Для контента
            'item' => $item,
        ]);
    }
    /*...*/

    /*... UPDATE...*/
    public function page_abilities_update(Request $request, $category, $id)
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
        // Обновляем информацию в БД
        DB::table('model_abilities')
            ->where('id', $id)
            ->update([
                'key_ability' => $key_ability,
                'durability' => $durability,
                'transparence' => $item_transparence,
                'mobility' => $item_mobility,
                'repeatability' => $item_repeatability,
            ]);

        /*... ЧАСТЬ 3 ...*/
        // Передаем в вид
        return redirect()->route('page-abilities-manage', $category)->with('success', 'Strategija atjaunota');
    }
    /*...*/


}