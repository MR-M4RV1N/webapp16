<?php

namespace App\Http\Controllers\PRO\External_environment\Success;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ExampleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... EXAMPLE ...*/
    public function page_success_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
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
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'success')
            ->where('block_name', $category)
            ->select('example')
            ->first();
        if($example == null)
        {
            $example_res = DB::table('table_theories_and_examples')
                ->where('model_name', 'default')
                ->where('block_name', 'default')
                ->select('example')
                ->first();
            $example = explode("; ", $example_res->example);
        }


        return view('PRO.External_environment.Success.page_success_example',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'example' => $example,
            'table_title' => $table_title,
        ]);
    }
    /*...*/


}