<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Ie;

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
    public function page_ie_list()
    {
        $page_sidebar = "strategy";
        $page_title = "IE analīze";
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

        // IFE
        $item1 = DB::table('model_ife')
            ->where('firm_name', $selected_firm_id)
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        if(isset($item1[0]))
        {
            $count1 = count($item1)-1;
            for($i = 0; $i <= $count1; $i++)
            {
                $score1[] = $item1[$i]->weight * $item1[$i]->rating;
            }
            $total_score1 = array_sum($score1);
        }
        else
        {
            $total_score1 = 0;
        }


        // EFE
        $item2 = DB::table('model_efe')
            ->where('firm_name', $selected_firm_id)
            ->select('id', 'item', 'weight', 'rating')
            ->get();
        if(isset($item2[0]))
        {
            $count2 = count($item2)-1;
            for($i = 0; $i <= $count2; $i++)
            {
                $score2[] = $item2[$i]->weight * $item2[$i]->rating;
            }
            $total_score2 = array_sum($score2);
        }
        else
        {
            $total_score2 = 0;
        }



        return view('PRO.Ie_matrix.Ie.page_ie_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'selected_firm_name' => $selected_firm_name,
            'table_models_text' => $table_models_text,
            'total_score1' => $total_score1,
            'total_score2' => $total_score2,
        ]);
    }
    /*...*/

}