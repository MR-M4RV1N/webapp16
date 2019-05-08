<?php

namespace App\Http\Controllers\PRO\External_environment\Pest;

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
    public function page_pest_example($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Piemērs";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "PEST analīze" => "/my_page/page_pest_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $table_title = "POLITISKĀ UN TIESISKĀ VIDE:";
            $table_intro = "Saistās ar spiedienu un iespējām, ko sniedz izmaiņas valdības un sabiedrības attieksmē pret nozari, izmaiņas politiskajās institūcijās un politisko procesu virziens, juridiskie jautājumi un vispārējā likumdošanas vide.";
            $table_example = "";
        }
        if($category == 2)
        {
            $table_title = "EKONOMISKĀ VIDE:";
            $table_intro = "Saistās ar sabiedrības ekonomiskajām struktūrām un tādiem faktoriem kā birža, procentu un inflācijas procenti, valsts ekonomiskā politika un rezultāti, valūtas kurss utt. Šie faktori dažādas nozares ietekmē atšķirīgi.";
        }
        if($category == 3)
        {
            $table_title = "SOCIĀLĀ UN DEMOGRĀFISKĀ VIDE:";
            $table_intro = "Saistās ar kultūras attieksmēm, ētiskiem uzskatiem, kopīgām vērtībām, dzīves stila diferenciācijas līmeni, demogrāfiju, izglītības līmeņiem utt. Sociālo faktoru novērošana palīdz organizācijām saglabāt to reputāciju iesaistīto pušu acīs.";
        }
        if($category == 4)
        {
            $table_title = "TEHNOLOĢISKĀ VIDE:";
            $table_intro = "Saistās ar izmaiņām tehnoloģijās, kas var mainīt uzņēmuma konkurētspējas pozīciju. Nozares saplūst; rodas jaunas stratēģiskās grupas; tiek uzlaboti pašreizējie produkti, un procesa inovācijas samazina ražošanas izmaksas. Vadības inovācijas ir daļa no tehnoloģiju apskata.";
        }

        //--- Для Вкладок
        $manage_link = 'page_pest_manage';
        $theory_link = 'page_pest_theory';
        $example_link = 'page_pest_example';
        //--- Для контента
        $example = DB::table('table_theories_and_examples')
            ->where('model_name', 'pest')
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
        else
        {
            $example_str = str_replace("\r\n", "", $example->example);
            $example = explode(";", $example_str);
        }

        return view('PRO.External_environment.Pest.page_pest_example',[
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
            'table_intro' => $table_intro,
        ]);
    }
    /*...*/


}