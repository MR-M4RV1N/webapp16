<?php

namespace App\Http\Controllers\PRO\External_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class CompetitorsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... FIRST_CREATE ...*/
    public function page_competitors_first_create()
    {
        $page_sidebar = "strategy";
        $page_title = "Konkurentu darbības salīdzinājums";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        /*... Код для контента ...*/
        $criteria = DB::table('model_competitors_criteria')->get();

        return view('PRO.External_environment.page_competitors_first_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'criteria' => $criteria,
        ]);
    }
    /*...*/

    /*... FIRST_STORE ...*/
    public function page_competitors_first_store(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // -- Данным из POST-а присваеваем переменную
        $data = $request->all();
        // -- Выбираем строчку и присваеваем переменную
        // - Для критериев
        for($i = 1; $i <= 18; $i++)
        {
            $kr[] = $data['kr'.$i];
        }

        /*... ЧАСТЬ 2 - Заносим данные ...*/
        // -- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        // -1- Добавляем название конкурента и выбранную для редактирования фирму
        DB::table('model_competitors')
            ->insert([
                'name' => $selected_firm_name,
                'type' => 'my_firm',
                'firm_name' => $selected_firm_id
            ]);
        // -2- Добавляем критерии
        $i = 1;
        foreach($kr as $kr)
        {
            DB::table('model_competitors')
                ->where('name', $selected_firm_name)
                ->update([
                    'kr'.$i => $kr
                ]);
            $i++;
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-competitors-edit')->with('success','My firm created!');
    }
    /*...*/


    /*... LIST ...*/
    public function page_competitors_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Konkurentu darbības salīdzinājums";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Получаем информацию о выбранной фирме
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'competitors')
            ->first();

        // -1- Получаем список критериев
        $criteria = DB::table('model_competitors_criteria')->get();
        // -2- Получаем данные конкурентов
        $competitors_res = DB::table('model_competitors')->where('firm_name', $selected_firm)->where('type', 'competitor')->get();
        $competitors = $competitors_res->toArray();
        $competitors_count = DB::table('model_competitors')->where('firm_name', $selected_firm)->count();
        // -3- Получаем свои данные
        $my_firm = DB::table('model_competitors')->where('firm_name', $selected_firm)->where('type', 'my_firm')->first();
        // -4- Считаем баллы конкурентов
        if(!empty($competitors))
        {
            for($ii = 0; $ii < $competitors_count-1; $ii++)
            {
                $k = 0;
                for($i = 1; $i <= 18; $i++)
                {
                    $kr = 'kr'.$i;
                    $a = $competitors[$ii]->$kr;
                    $k += $a;
                }
                $competitors_total[] = $k;
            }
        }
        else
        {
            $competitors_total = null;
        }

        // -6- Считаем свои быллы
        if(!empty($my_firm))
        {
            $k = 0;
            for($i = 1; $i <= 18; $i++)
            {
                $kr = 'kr'.$i;
                $a = $my_firm->$kr;
                $k += $a;
            }
            $my_firm_total = $k;
        }
        else
        {
            $my_firm_total = null;
        }



        return view('PRO.External_environment.page_competitors_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_firm_name' => $selected_firm_name,
            'competitors' => $competitors,
            'competitors_count' => $competitors_count,
            'criteria' => $criteria,
            'my_firm' => $my_firm,
            'competitors_total' => $competitors_total,
            'my_firm_total' => $my_firm_total,
        ]);
    }
    /*...*/

    /*... EDIT ...*/
    public function page_competitors_edit()
    {
        $page_sidebar = "strategy";
        $page_title = "Modeļa redaktors"; // Должно было быть "Redaktors" но тогда откроются три вкладки
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Konkurentu darbības salīdzinājums" => "/my_page/page_competitors_list",
        );

        $selected_firm = GetSelectedFirm::selected_firm_id();


        /*... Код для контента ...*/
        $my_firm = DB::table('model_competitors')
            ->select('id', 'name')
            ->where('firm_name', $selected_firm)
            ->where('type', 'my_firm')
            ->first();

        $competitors = DB::table('model_competitors')
            ->select('id', 'name')
            ->where('firm_name', $selected_firm)
            ->where('type', 'competitor')
            ->get();

        return view('PRO.External_environment.page_competitors_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'my_firm' => $my_firm,
            'competitors' => $competitors,
        ]);
    }
    /*...*/


    /*... CRUD_CREATE ...*/
    public function page_competitors_crud_create()
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Konkurentu darbības salīdzinājums" => "/my_page/page_competitors_list",
            "Redaktors" => "/my_page/page_competitors_edit",
        );
        /*... Код для контента ...*/
        $criteria = DB::table('model_competitors_criteria')->get();

        return view('PRO.External_environment.page_competitors_crud_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'criteria' => $criteria,
        ]);
    }
    /*...*/

    /*... CRUD_STORE ...*/
    public function page_competitors_crud_store(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // -- Данным из POST-а присваеваем переменную
        $data = $request->all();
        // -- Выбираем строчку и присваеваем переменную
        // - Для названия фирмы
        $competitor_name = $data['competitor_name'];
        // - Для критериев
        for($i = 1; $i <= 18; $i++)
        {
            $kr[] = $data['kr'.$i];
        }

        /*... ЧАСТЬ 2 - Заносим данные ...*/
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();
        // -1- Добавляем название конкурента и выбранную для редактирования фирму
        DB::table('model_competitors')
            ->insert([
                'name' => $competitor_name,
                'type' => 'competitor',
                'firm_name' => $selected_firm
            ]);
        // -2- Добавляем критерии
        $i = 1;
        foreach($kr as $kr)
        {
            DB::table('model_competitors')
                ->where('name', $competitor_name)
                ->update([
                    'kr'.$i => $kr
                ]);
            $i++;
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-competitors-edit')->with('success','Created!');
    }
    /*...*/


    /*... CRUD_EDIT ...*/
    public function page_competitors_crud_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Konkurentu darbības salīdzinājums" => "/my_page/page_competitors_list",
            "Redaktors" => "/my_page/page_competitors_edit",
        );
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... Код для контента ...*/
        $criteria = DB::table('model_competitors_criteria')->get();
        $competitors = DB::table('model_competitors')->where('id', $id)->get();

        return view('PRO.External_environment.page_competitors_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'criteria' => $criteria,
            'competitors' => $competitors,
        ]);
    }
    /*...*/

    /*... CRUD_UPDATE ...*/
    public function page_competitors_crud_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        for($i = 1; $i <= 18; $i++)
        {
            $kr[] = $data['kr'.$i];
        }

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        $i = 1;
        foreach($kr as $kr)
        {
            DB::table('model_competitors')
                ->where('id', $id)
                ->update([
                    'kr'.$i => $kr
                ]);
            $i++;
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-competitors-edit')->with('success','Updated!');
    }
    /*...*/

    /*... CRUD_DELETE ...*/
    public function page_competitors_crud_destroy($id)
    {
        // Удаляем элемент
        DB::table('model_competitors')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-competitors-edit')->with('success','Deleted!');
    }
    /*...*/
}
