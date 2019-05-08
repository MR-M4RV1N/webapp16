<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WordTestController extends Controller
{
    public function createWordDocx()
    {
        $wordTest = new \PhpOffice\PhpWord\PhpWord();

        // New portrait section
        $section = $wordTest->addSection();
        // Define table style arrays
        $styleTable = array('borderSize'=>6, 'borderColor'=>'006699', 'cellMargin'=>80);
        $styleFirstRow = array('borderBottomSize'=>18, 'borderBottomColor'=>'0000FF', 'bgColor'=>'66BBFF');
        // Define cell style arrays
        $styleCell = array('valign'=>'center');
        $styleCellBTLR = array('valign'=>'center', 'textDirection'=>\PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
        // Define font style for first row
        $fontStyle = array('bold'=>true, 'align'=>'center');
        // Add table style
        $wordTest->addTableStyle('myOwnTableStyle', $styleTable, $styleFirstRow);
        // Add table
        $table = $section->addTable('myOwnTableStyle');
        // Add row
        $table->addRow(900);
        // Add cells
        $table->addCell(2000, $styleCell)->addText('Row 1', $fontStyle, array('align' => 'right'));
        $table->addCell(2000, $styleCell)->addText('Row 2', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 3', $fontStyle);
        $table->addCell(2000, $styleCell)->addText('Row 4', $fontStyle);
        $table->addCell(500, $styleCellBTLR)->addText('Row 5', $fontStyle);
        // Add more rows / cells
        for($i = 1; $i <= 10; $i++) {
            $table->addRow();
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");
            $table->addCell(2000)->addText("Cell $i");

            $text = ($i % 2 == 0) ? 'X' : '';
            $table->addCell(500)->addText($text);
        }




        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($wordTest, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }
}
