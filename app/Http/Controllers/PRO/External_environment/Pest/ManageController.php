<?php

namespace App\Http\Controllers\PRO\External_environment\Pest;

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
    public function page_pest_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
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


        //--- Для контента
        $item = DB::table('model_pest')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', $category)
            ->select('id', 'item')
            ->get();


        return view('PRO.External_environment.Pest.page_pest_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для контента
            'item' => $item,
            'table_title' => $table_title,
            'table_intro' => $table_intro,
        ]);
    }

    public function page_pest_store(Request $request, $category)
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
        DB::table('model_pest')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-pest-manage', $category)->with('success','Элемент добвален');
    }

    public function page_pest_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_pest')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-pest-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}