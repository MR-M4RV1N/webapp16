<?php

namespace App\Http\Controllers\PRO\Internal_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;

class ContributionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... LIST ...*/
    public function page_contribution_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Ieguldījums priekšrocībā";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = DB::table('table_models_text')
            ->where('model_name', 'contribution')
            ->first();

        $item1 = DB::table('model_contribution')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('id', 'item')
            ->get();

        $resources_1 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [1, 2])
            ->select('item')
            ->get();

        $resources_2 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [3, 4])
            ->select('item')
            ->get();

        $resources_3 = DB::table('model_resources')
            ->where('firm_name', $selected_firm_id)
            ->whereIn('cat', [5, 6, 7])
            ->select('item')
            ->get();

        $abilities = DB::table('model_abilities')
            ->where('firm_name', $selected_firm_id)
            ->select('key_ability')
            ->get();

        $success = DB::table('model_success')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 7)
            ->select('item')
            ->get();


        return view('PRO.Internal_environment.page_contribution_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,

            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'resources_1' => $resources_1,
            'resources_2' => $resources_2,
            'resources_3' => $resources_3,
            'abilities' => $abilities,
            'success' => $success,
        ]);
    }
    /*...*/


    /*... MANAGE ...*/
    public function page_contribution_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ieguldījums priekšrocībā" => "/my_page/page_contribution_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Конкурентные преимущества:";
        }

        //--- Для контента
        $item = DB::table('model_contribution')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.Internal_environment.page_contribution_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            'page_title' => $page_title,

            // Для контента
            'item' => $item,
            'table_title' => $table_title,
        ]);
    }
    /*...*/

// ------------------------------

    /*... EDIT ...*/
    public function page_contribution_edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ieguldījums priekšrocībā" => "/my_page/page_contribution_list",
            "Redaktors" => "/my_page/page_contribution_manage/1",
        );
        //--- Для контента
        $item = DB::table('model_contribution')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Internal_environment.page_contribution_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_contribution_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_contribution')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_contribution')
            ->where('id', $id)
            ->select('cat')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-contribution-manage', ['category' => $category->cat])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... CREATE ...*/
    public function page_contribution_create($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Ieguldījums priekšrocībā" => "/my_page/page_contribution_list",
            "Redaktors" => "/my_page/page_contribution_manage/1",
        );
        /*... Код для контента ...*/


        return view('PRO.Internal_environment.page_contribution_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category' => $category,
        ]);
    }

    public function page_contribution_store(Request $request, $category)
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
        DB::table('model_contribution')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-contribution-manage', [$category])->with('success','Элемент добвален');
    }
    /*...*/


// ==============================


    /*... DELETE ...*/
    public function page_contribution_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_contribution')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-contribution-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/

}
