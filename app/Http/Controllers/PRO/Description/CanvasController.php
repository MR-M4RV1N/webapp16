<?php

namespace App\Http\Controllers\PRO\Description;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class CanvasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ ...*/
    public function firm_canvas_list()
    {
        $page_sidebar = "strategy";
        $page_title = "Canvas Business Model";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
        );
        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        // Получаем текст на выбранном языке
        $table_models_text = GetLanguageText::table_model_text('canvas');
        $firm_canvas_result = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->get();



        $model_canvas_kp_result = DB::table('model_canvas')->where('category', 'kp')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_kd_result = DB::table('model_canvas')->where('category', 'kd')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_cp_result = DB::table('model_canvas')->where('category', 'cp')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_vk_result = DB::table('model_canvas')->where('category', 'vk')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_ps_result = DB::table('model_canvas')->where('category', 'ps')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_kr_result = DB::table('model_canvas')->where('category', 'kr')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_ks_result = DB::table('model_canvas')->where('category', 'ks')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_si_result = DB::table('model_canvas')->where('category', 'si')->where('firm_name', $selected_firm_id)->count();
        $model_canvas_pd_result = DB::table('model_canvas')->where('category', 'pd')->where('firm_name', $selected_firm_id)->count();



        return view('PRO.Description.firm_canvas_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'table_models_text' => $table_models_text,
            'firm_canvas_result' => $firm_canvas_result,
            
            'model_canvas_kp_result' => $model_canvas_kp_result,
            'model_canvas_kd_result' => $model_canvas_kd_result,
            'model_canvas_cp_result' => $model_canvas_cp_result,
            'model_canvas_vk_result' => $model_canvas_vk_result,
            'model_canvas_ps_result' => $model_canvas_ps_result,
            'model_canvas_kr_result' => $model_canvas_kr_result,
            'model_canvas_ks_result' => $model_canvas_ks_result,
            'model_canvas_si_result' => $model_canvas_si_result,
            'model_canvas_pd_result' => $model_canvas_pd_result,
        ]);
    }


    public function firm_canvas_edit($canvas_block)
    {
        $page_sidebar = "strategy";
        $page_title = "Redaktors";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Busines Model" => "/my_page/firm_canvas_list",
        );
        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        $firm_canvas_result = DB::table('model_canvas')
            ->select('id', 'item')
            ->where('category', $canvas_block)
            ->where('firm_name', $selected_firm_id)
            ->get();

        $item = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', $canvas_block)
            ->select('id', 'item')
            ->get();

        if($canvas_block == 'kp') { $category_name = "Galvenie partneri"; }
        if($canvas_block == 'kd') { $category_name = "Galvenās aktivitātes"; }
        if($canvas_block == 'kr') { $category_name = "Galvenie resursi"; }
        if($canvas_block == 'cp') { $category_name = "Vērtigie piedavājumi"; }
        if($canvas_block == 'vk') { $category_name = "Attiecības ar klientiem"; }
        if($canvas_block == 'ks') { $category_name = "Noietas kanali"; }
        if($canvas_block == 'ps') { $category_name = "Pateretāju segmenti"; }
        if($canvas_block == 'si') { $category_name = "Izdevumu struktūra"; }
        if($canvas_block == 'pd') { $category_name = "Ienākumu struktūra"; }


        return view('PRO.Description.firm_canvas_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'category_name' => $category_name,
            'canvas_block' => $canvas_block,
            'item' => $item,
        ]);
    }


    /*... CREATE ...*/
    public function firm_canvas_crud_create($canvas_block)
    {
        $page_sidebar = "strategy";
        $page_title = "Pievienot";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Busines Model" => "/my_page/firm_canvas_list",
            "Redaktors" => "/my_page/firm_canvas_edit/".$canvas_block,
        );
        //--- Для контента (BA/Svid/svid_tows_list.blade.php)


        return view('PRO.Description.firm_canvas_crud_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'canvas_block' => $canvas_block,
        ]);
    }


    /*... STORE ...*/
    public function firm_canvas_crud_store(Request $request, $canvas_block)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        //--- Информация о выбранной фирме
        $selected_firm_id = GetSelectedFirm::selected_firm_id();

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_canvas')
            ->insert([
                'category' => $canvas_block,
                'item' => $item,
                'firm_name' => $selected_firm_id,
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('firm_canvas_edit', ['canvas_block' => $canvas_block])->with('success','Strategija pievienota');
    }


    /*... UPDATE ...*/
    public function firm_canvas_crud_edit($canvas_block, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "Canvas Busines Model" => "/my_page/firm_canvas_list",
            "Redaktors" => "/my_page/firm_canvas_edit/".$canvas_block,
        );
        //--- Для контента (BA/Svid/svid_tows_crud_edit.blade.php)
        $firm_canvas_result = DB::table('model_canvas')
            ->where('id', $id)
            ->select('item')
            ->first();

        return view('PRO.Description.firm_canvas_crud_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'canvas_block' =>  $canvas_block,
            'id' => $id,
            'firm_canvas_result' => $firm_canvas_result
        ]);
    }

    public function firm_canvas_crud_update(Request $request, $canvas_block, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $firm_canvas_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_canvas')
            ->where('id', $id)
            ->update([
                'item' => $firm_canvas_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('firm_canvas_edit', [' canvas_block' =>  $canvas_block])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... DELETE ...*/
    public function firm_canvas_crud_destroy($canvas_block, $id)
    {
        // Удаляем элемент
        DB::table('model_canvas')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('firm_canvas_edit', ['canvas_block' => $canvas_block])->with('success','Элемент удален');
    }
    /*...*/


// ==============================


    public function downloadCanvas()
    {
        // Узнаем id выбранной фирмы
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        // Выборка из БД. Переменная для каждой категории
        $item1_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'kp')
            ->select('id', 'item')
            ->get();

        $item2_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'kd')
            ->select('id', 'item')
            ->get();

        $item3_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'cp')
            ->select('id', 'item')
            ->get();

        $item4_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'vk')
            ->select('id', 'item')
            ->get();

        $item5_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'ps')
            ->select('id', 'item')
            ->get();

        $item6_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'kr')
            ->select('id', 'item')
            ->get();

        $item7_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'ks')
            ->select('id', 'item')
            ->get();

        $item8_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'si')
            ->select('id', 'item')
            ->get();

        $item9_res = DB::table('model_canvas')
            ->where('firm_name', $selected_firm_id)
            ->where('category', 'pd')
            ->select('id', 'item')
            ->get();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->setDefaultFontName('Times New Roman');

        // New section
        $sectionStyle = array(
            'orientation' => 'landscape',
        );
        $section = $phpWord->addSection($sectionStyle);

        $section->addText('Canvas Business Model', array('size' => 16, 'bold' => true, 'align' => 'center'), array('align' => 'center', 'spaceAfter' => 500));

        // --- Table style
        // Define cell style arrays
        $styleCell = array('valign'=>'top');
        $styleCellBTLR = array('valign'=>'center', 'textDirection'=>\PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        // Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center', 'vertical-align'=>'middle');
        $fontStyle_1 = array('align'=>'center');
        // Define table style arrays
        $styleTable = array(
            'borderSize'=>6,
            'borderColor'=>'006699',
            'cellMargin'=>80,
            'align'=>'center',
        );
        $styleFirstRow = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
        // Add table style
        $phpWord->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        $cellRowSpan = array('vMerge' => 'restart');
        $cellRowContinue = array('vMerge' => 'continue');
        $cellColSpan = array('gridSpan' => 3);
        $cellColRowSpan = array('gridSpan' => 2, 'vMerge' => 'restart');

        // --- Table Nr1
        // Add table
        $table = $section->addTable('myOwnTableStyle');
        //-1------------
        // Add row
        $table->addRow(2400);
        // Add cells
        $table_cell_1 = $table->addCell(3000, $cellRowSpan);
        if(isset($item1_res[0]->item) && !empty($item1_res[0]->item))
        {
            foreach($item1_res as $i)
            {
                $table_cell_1->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table_cell_2 = $table->addCell(3000, $styleCell);
        if(isset($item2_res[0]->item) && !empty($item2_res[0]->item))
        {
            foreach($item2_res as $i)
            {
                $table_cell_2->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table_cell_3 = $table->addCell(3000, $cellRowSpan);
        if(isset($item3_res[0]->item) && !empty($item3_res[0]->item))
        {
            foreach($item3_res as $i)
            {
                $table_cell_3->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table_cell_4 = $table->addCell(3000, $styleCell);
        if(isset($item4_res[0]->item) && !empty($item4_res[0]->item))
        {
            foreach($item4_res as $i)
            {
                $table_cell_4->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table_cell_5 = $table->addCell(3000, $cellRowSpan);
        if(isset($item5_res[0]->item) && !empty($item5_res[0]->item))
        {
            foreach($item5_res as $i)
            {
                $table_cell_5->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        //-2------------
        // Add row
        $table->addRow(2400);
        // Add cell
        $table->addCell(3000, $cellRowContinue);

        $table_cell_6 = $table->addCell(3000, $styleCell);
        if(isset($item6_res[0]->item) && !empty($item6_res[0]->item))
        {
            foreach($item6_res as $i)
            {
                $table_cell_6->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table->addCell(3000, $cellRowContinue);

        $table_cell_7 = $table->addCell(3000, $styleCell);
        if(isset($item7_res[0]->item) && !empty($item7_res[0]->item))
        {
            foreach($item7_res as $i)
            {
                $table_cell_7->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table->addCell(3000, $cellRowContinue);

        // --- Table Nr2
        // Add table
        $table = $section->addTable('myOwnTableStyle');
        //-1------------
        // Add row
        $table->addRow(2400);
        // Add cells
        $table_cell_8 = $table->addCell(7500, $styleCell);
        if(isset($item8_res[0]->item) && !empty($item8_res[0]->item))
        {
            foreach($item8_res as $i)
            {
                $table_cell_8->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }

        $table_cell_9 = $table->addCell(7500, $styleCell);
        if(isset($item9_res[0]->item) && !empty($item9_res[0]->item))
        {
            foreach($item9_res as $i)
            {
                $table_cell_9->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }


        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }

}
