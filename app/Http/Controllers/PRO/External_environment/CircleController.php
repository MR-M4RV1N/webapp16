<?php

namespace App\Http\Controllers\PRO\External_environment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class CircleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ / EDIT ...*/
    public function page_circle_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Dzīves cikla līknē";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        $table_models_text = GetLanguageText::table_model_text('circle');

        // Выбераем информацию из БД
        $selected_value_result = DB::table('model_circle')
            ->select('selected_value')
            ->where('firm_name', $selected_firm)
            ->get();
        // Проверяем была ли сделанна запись
        if(isset($selected_value_result[0]->selected_value))
        {
            $selected_value = $selected_value_result[0]->selected_value;
        }
        else
        {
            $selected_value = null;
        }

        return view('PRO.External_environment.page_circle_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'selected_value' => $selected_value,
        ]);
    }


    /*... UPDATE ...*/
    public function page_circle_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_value = $data['selected_value'];

        /*... ЧАСТЬ 2 ...*/
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 3 ...*/
        // Проверяем была ли сделанна запись
        $check_selected_value = DB::table('model_circle')
            ->select('selected_value')
            ->where('firm_name', $selected_firm)
            ->get();

        if(isset($check_selected_value[0]->selected_value))
        {
            // Обновляем запись
            DB::table('model_circle')
                ->where('firm_name', $selected_firm)
                ->update([
                    'selected_value' => $selected_value
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('page-circle-list')->with('success','Value selected (updated)');
        }
        else
        {
            // Создаем запись
            DB::table('model_circle')
                ->insert([
                    'selected_value' => $selected_value,
                    'firm_name' => $selected_firm,
                ]);

            /*... Передаем в вид ...*/
            return redirect()->route('page-circle-list')->with('success','Value selected (created)');
        }

    }


    /*... DELETE ...*/
    public function page_circle_destroy()
    {
        // Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();
        // Удаляем элемент
        DB::table('model_circle')->where('firm_name', $selected_firm)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-circle-list')->with('success','Record deleted');
    }


// ==============================

    public function downloadCircle()
    {
        // ---01. Запросы к БД
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        $item_res = DB::table('model_circle')
            ->where('firm_name', $selected_firm_id)
            ->select('selected_value')
            ->first();
        if(isset($item_res->selected_value))
        {
            if($item_res->selected_value == 'option1')
            {
                $image = 'images/forWord/Circle_1.png';
            }
            if($item_res->selected_value == 'option2')
            {
                $image = 'images/forWord/Circle_2.png';
            }
            if($item_res->selected_value == 'option3')
            {
                $image = 'images/forWord/Circle_3.png';
            }
            if($item_res->selected_value == 'option4')
            {
                $image = 'images/forWord/Circle_4.png';
            }

            /* ---!!!--- Ошибка: Если option5 то выдаст ошибку */
        }
        else
        {
            $image = 'images/forWord/Circle_0.png';
        }


        // ---1. phpWord
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');

        // ---2.1 New section
        $sectionStyle = array(
            'orientation' => 'landscape',
        );
        $section = $phpWord->addSection($sectionStyle);
        // ---2.2 Main Kontent
        // Добавляем заглавие
        $section->addText('Dzīves cikls', array('size' => 16, 'bold' => true, 'align' => 'center'), array('align' => 'center', 'spaceAfter' => 500));
        // Добавляем картинку
        $section->addImage(
            $image,
            array(
                'align' => 'center'
            )
        );


        // ---3. Writer
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }
        return response()->download(storage_path('TestWordFile.docx'));
    }

}
