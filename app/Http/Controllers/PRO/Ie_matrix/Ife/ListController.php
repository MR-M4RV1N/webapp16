<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Ife;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class ListController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    /*... LIST ...*/
    public function page_ife_list()
    {
        $page_sidebar = "strategy";
        $page_title = "IFE analīze";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('ife');

        // stiprās puses
        $item1 = DB::table('model_ife')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 'S')
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        if(isset($item1[0]))
        {
            $count1 = count($item1)-1;
            for($i = 0; $i <= $count1; $i++)
            {
                $score1_arr[] = $item1[$i]->weight * $item1[$i]->rating;
            }
            $score1 = array_sum($score1_arr);
        }
        else
        {
            $score1 = 0;
        }

        // vājās puses
        $item2 = DB::table('model_ife')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 'V')
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        if(isset($item2[0]))
        {
            $count2 = count($item2)-1;
            for($i = 0; $i <= $count2; $i++)
            {
                $score2_arr[] = $item2[$i]->weight * $item2[$i]->rating;
            }
            $score2 = array_sum($score2_arr);
        }
        else
        {
            $score2 = 0;
        }

        // kopā
        $item = DB::table('model_ife')
            ->where('firm_name', $selected_firm_id)
            ->select('id', 'item', 'weight', 'rating')
            ->get();

        if(isset($item[0]))
        {
            $total_count = count($item)-1;
            $total_weight = 0;
            $total_rating = 0;
            for($i = 0; $i <= $total_count; $i++)
            {
                $total_weight += $item[$i]->weight;
                $total_rating += $item[$i]->rating;
            }
            $total_score = $score1 + $score2;
        }
        else
        {
            $total_weight = 0;
            $total_rating = 0;
            $total_score = 0;
        }




        return view('PRO.Ie_matrix.Ife.page_ife_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,
            'table_models_text' => $table_models_text,
            'item1' => $item1,
            'item2' => $item2,
            // Для контента
            'score1' => $score1,
            'score2' => $score2,
            'total_weight' => $total_weight,
            'total_rating' => $total_rating,
            'total_score' => $total_score,
        ]);
    }
    /*...*/

}