<?php

namespace App\Http\Controllers\PRO\Description\Canvas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class WordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


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