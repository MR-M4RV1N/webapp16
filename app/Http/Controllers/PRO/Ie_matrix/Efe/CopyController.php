<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Efe;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class CopyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... COPY EFE ...*/
    public function page_efe_copy($category)
    {
        //--- Для контента
        // Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $cat = "I";
        }

        if($category == 2)
        {
            $cat = "D";
        }

        // Выбераем данные из SWOT
        $item = DB::table('svid_table_2')
            ->where('firm_name', $selected_firm_id)
            ->where('category', $cat)
            ->select('item')
            ->get();
//dd($category);
        // Заносим информацию
        foreach($item as $i)
        {
            DB::table('model_efe')->insert([
                'cat' => $cat,
                'item' => $i->item,
                'firm_name' => $selected_firm_id
            ]);
        }


        return redirect()->route('page-efe-list', $category)->with('success','SUCCESS');
    }

}