<?php

namespace App\Http\Controllers\PRO\External_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ForcesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... CRUD_LIST ...*/
    public function page_forces_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Portera piecu spēku modelis";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('forces');

        for($i = 1; $i <= 5; $i++)
        {
            $force[] = DB::table('model_forces')
                ->where('firm_name', $selected_firm_id)
                ->where('cat', $i)
                ->select('ietekme')
                ->first();
        }

        return view('PRO.External_environment.page_forces_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'force' => $force,
        ]);
    }
    /*...*/


    /*... CRUD_EDIT ...*/
    public function page_forces_crud_edit($force_cat)
    {
        $page_sidebar = "strategy";
        $page_title = "Modeļa redaktors"; // Должно было быть "Redaktors" но тогда откроются три вкладки
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Portera piecu spēku modelis" => "/my_page/page_forces_list",
        );
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        /*... Код для контента ...*/
        $force = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $force_cat)
            ->first();

        if($force_cat == 1)
        {
            $force_name = "Piegādātāji";
        }
        if($force_cat == 2)
        {
            $force_name = "Potenciālie tirgus dalibnieki ";
        }
        if($force_cat == 3)
        {
            $force_name = "Konkurenti";
        }
        if($force_cat == 4)
        {
            $force_name = "Aizvietotāji";
        }
        if($force_cat == 5)
        {
            $force_name = "Patērētāji";
        }

        return view('PRO.External_environment.page_forces_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'force_cat' => $force_cat,
            'force' => $force,
            'force_name' => $force_name
        ]);
    }
    /*...*/


    /*... CRUD_UPDATE ...*/
    public function page_forces_crud_update(Request $request, $force_cat)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $ietekme = $data['ietekme'];

        /*... ЧАСТЬ 2 ...*/
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        // -- Обновляем информацию в БД
        $force_check = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $force_cat)
            ->first();
        if($force_check !== null)
        {
            DB::table('model_forces')
                ->where('firm_name', $selected_firm_id)
                ->where('cat', $force_cat)
                ->update([
                    'ietekme' => $ietekme
                ]);
            $result = 'Updated!';
        }
        else
        {
            DB::table('model_forces')
                ->insert([
                    'cat' => $force_cat,
                    'ietekme' => $ietekme,
                    'firm_name' => $selected_firm_id,
                ]);
            $result = 'Created!';
        }


        /*... Передаем в вид ...*/
        $sub = DB::table('category_sub')
            ->where('route', 'page_forces_list')
            ->select('id')
            ->first();

        return redirect()->route('page-forces-list', ['sub' => $sub->id])->with('success',$result);
    }



    /*...*/
}
