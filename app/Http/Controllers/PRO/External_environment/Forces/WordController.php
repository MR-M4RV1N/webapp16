<?php

namespace App\Http\Controllers\PRO\External_environment\Forces;

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


    public function downloadForces()
    {
        // ============================== 01. Запросы к БД
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        $item1_res = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 1)
            ->select('ietekme')
            ->first();

        $item2_res = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 2)
            ->select('id', 'ietekme')
            ->first();

        $item3_res = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 3)
            ->select('id', 'ietekme')
            ->first();

        $item4_res = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 4)
            ->select('id', 'ietekme')
            ->first();

        $item5_res = DB::table('model_forces')
            ->where('firm_name', $selected_firm_id)
            ->where('cat', 5)
            ->select('id', 'ietekme')
            ->first();


        // ============================== 1. phpWord
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('Times New Roman');


        // ============================== 2.1 New section
        $sectionStyle = array(
            'orientation' => 'landscape',
        );
        $section = $phpWord->addSection($sectionStyle);
        // ============================== 2.2 Main Kontent

        // --- Добавляем заглавие
        $section->addText('Piecu spēku analīze', array('size' => 16, 'bold' => true, 'align' => 'center'), array('align' => 'center', 'spaceAfter' => 500));

        // --- Добавляем стили таблицы
        // Define cell style arrays
        $styleCell = array('valign'=>'top');
        $styleCell1 = array('borderSize'=>'3');
        $styleInsideCell = array();
        $styleCellBTLR = array('valign'=>'center', 'textDirection'=>\PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        // Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center', 'vertical-align'=>'middle');
        $InsidefontStyle_1 = array('bold'=>true, 'align'=>'center', 'valign'=>'center');
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

        // --- Добавляем саму таблицу
        // Add table
        $table = $section->addTable('myOwnTableStyle');

        // -1--
        // Add row
        /*
         * Lifehack 1. Далее будет показан пример таблица в таблице (два уровня вложенности)
         */
        $table->addRow(2000);
        $cel_1 = $table->addCell(4000, $styleCell);
            $inside_table = $cel_1->addTable('myOwnTableStyle2');
            $inside_table->addRow(1000);
            $inside_table->addCell(4000, $styleInsideCell)->addText('Piegādātāji', $InsidefontStyle_1, array('align' => 'center', 'spaceBefore' => 700));
            $inside_table->addRow(1000);
            $inside_table->addCell(4000, $styleInsideCell)->addText($item1_res->ietekme, $fontStyle, array('align' => 'center', 'spaceAfter' => 0));


        /*
         * Lifehack 2. Далее будет показан пример таблица в таблице в таблице (три уровня вложенности)
         */
        $table->addRow(2000);
        $cel_2 = $table->addCell(4000, $styleCell);
            $inside_table = $cel_2->addTable('myOwnTableStyle3');
            $inside_table->addRow(500);
            $inside_cell = $inside_table->addCell(500);
                $inside_table_2 = $inside_cell->addTable();
                $inside_table_2->addRow(500, $styleCell1);
                $inside_table_2->addCell(500, $styleCell1)->addText('A');
                $inside_table_2->addRow(500, $styleCell1);
                $inside_table_2->addCell(500, $styleCell1)->addText('B');



        /*$cell2 = $table->addCell(2000, $styleCell);
            $textrun2 = $cell2->addTextRun($fontStyle);
            $textrun2->addText('B');*/
        // Add cells
        //$table->addCell(5000, $styleCell)->addText('Piegādātāji', $fontStyle, array('align' => 'center', 'spaceAfter' => 0));


        /*
         * Lifehack 3. Что бы указать рамки таблицы снизу: 'borderBottomSize'=>18
         */

        /*
         * Lifehack 4. вместо vertical-align можно использовать 'spaceBefore' => 700
         */


        // ============================== 3. Writer
        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }

}