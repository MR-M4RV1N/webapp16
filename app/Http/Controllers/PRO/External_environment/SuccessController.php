<?php

namespace App\Http\Controllers\PRO\External_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class SuccessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... LIST ...*/
    public function page_success_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Veiksmes faktori nozarē";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('success');

        $item1 = DB::table('model_success')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.page_success_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,

            'table_models_text' => $table_models_text,
            'item1' => $item1,
        ]);
    }
    /*...*/

    /*... MANAGE ...*/
    public function page_success_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Modeļa redaktors"; // Должно было быть "Redaktors" но тогда откроются три вкладки
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Veiksmes faktori nozarē" => "/my_page/page_success_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        $title = "success factors";

        //--- Для контента
        $item = DB::table('model_success')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.page_success_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            'title' => $title,

            // Для контента
            'item' => $item,
        ]);
    }
    /*...*/


    /*... EDIT ...*/
    public function page_success_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Veiksmes faktori nozarē" => "/my_page/page_success_list",
            "Redaktors" => "/my_page/page_success_manage/".$category,
        );
        //--- Для контента
        $item = DB::table('model_success')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.External_environment.page_success_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_success_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_success')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_success')
            ->where('id', $id)
            ->select('cat')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-success-manage', ['category' => $category->cat])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... CREATE ...*/
    public function page_success_create($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Veiksmes faktori nozarē" => "/my_page/page_success_list",
            "Redaktors" => "/my_page/page_success_manage/".$category,
        );
        /*... Код для контента ...*/


        return view('PRO.External_environment.page_success_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category' => $category,
        ]);
    }

    public function page_success_store(Request $request, $category)
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
        DB::table('model_success')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-success-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_success_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_success')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-success-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/

}
