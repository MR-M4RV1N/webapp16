<?php

namespace App\Http\Controllers\PRO\External_environment\Pest;

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


    public function downloadPest()
    {
        // ---01. Запросы к БД
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        $item1_res = DB::table('model_pest')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('item')
            ->get();

        $item2_res = DB::table('model_pest')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'item')
            ->get();

        $item3_res = DB::table('model_pest')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 3)
            ->select('id', 'item')
            ->get();

        $item4_res = DB::table('model_pest')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 4)
            ->select('id', 'item')
            ->get();


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
        $section->addText('PEST analīze', array('size' => 16, 'bold' => true, 'align' => 'center'), array('align' => 'center', 'spaceAfter' => 500));
        // Добавляем таблицу
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
        // --- Table
        // Add table
        $table = $section->addTable('myOwnTableStyle');
        //-1--
        // Add row
        $table->addRow();
        // Add cells
        $table->addCell(8000, $styleCell)->addText('POLITISKĀ UN TIESISKĀ VIDE', $fontStyle, array('align' => 'center', 'spaceAfter' => 0));
        $table->addCell(8000, $styleCell)->addText('EKONOMISKĀ VIDE', $fontStyle, array('align' => 'center', 'spaceAfter' => 0));
        //-2--
        // Add row
        $table->addRow(2000);
        // Add cell
        $table_cell_1 = $table->addCell(8000, $styleCell);
        if(isset($item1_res[0]->item) && !empty($item1_res[0]->item))
        {
            foreach($item1_res as $i)
            {
                $table_cell_1->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }
        // Add cell
        $table_cell_2 = $table->addCell(8000, $styleCell);
        if(isset($item2_res[0]->item) && !empty($item2_res[0]->item))
        {
            foreach($item2_res as $i)
            {
                $table_cell_2->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }
        //-3--
        // Add row
        $table->addRow();
        // Add cells
        $table->addCell(8000, $styleCell)->addText('SOCIĀLĀ UN DEMOGRĀFISKĀ VIDE', $fontStyle, array('align' => 'center', 'spaceAfter' => 0));
        $table->addCell(8000, $styleCell)->addText('TEHNOLOĢISKĀ VIDE', $fontStyle, array('align' => 'center', 'spaceAfter' => 0));
        //-4--
        // Add row
        $table->addRow(2000);
        // Add cell
        $table_cell_3 = $table->addCell(6000, $styleCell);
        if(isset($item3_res[0]->item) && !empty($item3_res[0]->item))
        {
            foreach($item3_res as $i)
            {
                $table_cell_3->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }
        // Add cell
        $table_cell_4 = $table->addCell(6000, $styleCell);
        if(isset($item4_res[0]->item) && !empty($item4_res[0]->item))
        {
            foreach($item4_res as $i)
            {
                $table_cell_4->addListItem($i->item,0, array('size' => 8), null, array('spacing' => 0, 'spaceAfter' => 0));
            }
        }


        // ---3. Writer
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }

}