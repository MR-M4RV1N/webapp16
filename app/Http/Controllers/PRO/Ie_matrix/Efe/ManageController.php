<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Efe;

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
    public function page_efe_manage($category)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "EFE analīze" => "/my_page/page_efe_list",
        );
        //
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == '1')
        {
            $table_title = "EFE:";
        }

        //--- Для Вкладок
        $manage_link = 'page_efe_manage';
        $theory_link = 'page_efe_theory';
        $example_link = 'page_efe_example';

        //--- Для контента
        // iespējas
        $item1 = DB::table('model_efe')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 'I')
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        $count1 = count($item1)-1;
        for($i = 0; $i <= $count1; $i++)
        {
            $score1[] = $item1[$i]->weight * $item1[$i]->rating;
        }
        // draudi
        $item2 = DB::table('model_efe')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 'D')
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        $count2 = count($item2)-1;
        for($i = 0; $i <= $count2; $i++)
        {
            $score2[] = $item2[$i]->weight * $item2[$i]->rating;
        }
        // kopā
        $item = DB::table('model_efe')
            ->where('firm_name', $selected_firm_id)
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        $total_count = count($item)-1;
        $total_weight = 0;
        $total_rating = 0;
        for($i = 0; $i <= $total_count; $i++)
        {
            $total_weight += $item[$i]->weight;
            $total_rating += $item[$i]->rating;
        }

        if(isset($score1) and isset($score2))
        {
            $total_score = array_sum($score1) + array_sum($score2);
        }
        else
        {
            $score1 = null;
            $score2 = null;
            $total_score = 0;
        }

        return view('PRO.Ie_matrix.Efe.page_efe_manage',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'category' => $category,
            // Для вкладок
            'manage_link' => $manage_link,
            'theory_link' => $theory_link,
            'example_link' => $example_link,
            // Для контента
            'item1' => $item1,
            'item2' => $item2,
            'table_title' => $table_title,
            'score1' => $score1,
            'score2' => $score2,
            'total_weight' => $total_weight,
            'total_rating' => $total_rating,
            'total_score' => $total_score,
        ]);
    }

    public function page_efe_store(Request $request, $category)
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
        DB::table('model_efe')->insert([
            'cat' => $category,
            'item' => $item,
            'firm_name' => $selected_firm
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-efe-manage', $category)->with('success','Элемент добвален');
    }

    public function page_efe_destroy($category, $id)
    {
        // Удаляем элемент
        DB::table('model_efe')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-efe-manage', [$category])->with('success','Элемент удален');
    }
    /*...*/


}