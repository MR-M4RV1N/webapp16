<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Ife;

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


    /*... COPY IFE ...*/
    public function page_ife_copy($category)
    {
        //--- Для контента
        // Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        if($category == 1)
        {
            $cat = "S";
        }

        if($category == 2)
        {
            $cat = "V";
        }

        // Выбераем данные из SWOT
        $item = DB::table('svid_table_1')
            ->where('firm_name', $selected_firm_id)
            ->where('category', $cat)
            ->select('item')
            ->get();

        // Заносим информацию
        foreach($item as $i)
        {
            DB::table('model_ife')->insert([
                'cat' => $cat,
                'item' => $i->item,
                'firm_name' => $selected_firm_id
            ]);
        }


        return redirect()->route('page-ife-list', $category)->with('success','SUCCESS');
    }

}