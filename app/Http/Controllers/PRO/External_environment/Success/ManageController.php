<?php

namespace App\Http\Controllers\PRO\External_environment\Success;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ManageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... MANAGE ...*/
    public function page_success_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Veiksmes faktori nozarē" => "/my_page/page_success_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "Kas ir uzņēmuma patērētāji?";
        }
        if($category == 2)
        {
            $table_title = "Ko grib uzņēmuma patērētāji?";
        }
        if($category == 3)
        {
            $table_title = "Kas ir konkurences dzinējspēks?";
        }
        if($category == 4)
        {
            $table_title = "Kādas ir konkurences pamatīpašības?";
        }
        if($category == 5)
        {
            $table_title = "Cik intensīva ir konkurence?";
        }
        if($category == 6)
        {
            $table_title = "Kā mēs varam panākt konkurētspējīgo priekšrocību?";
        }
        if($category == 7)
        {
            $table_title = "Veiksmes faktori";
        }

        //--- Для Вкладок
        $manage_link = 'page_success_manage';
        $theory_link = 'page_success_theory';
        $example_link = 'page_success_example';

        //--- Для контента
        $item = DB::table('model_success')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.Success.page_success_manage',[
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
        return redirect()->route('page-success-manage', $category)->with('success','Элемент добвален');
    }

    public function page_success_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_success')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-success-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}