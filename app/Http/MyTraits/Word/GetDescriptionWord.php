<?php

namespace App\Http\MyTraits\Word;

use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;


trait GetDescriptionWord
{
    public function downloadDescription()
    {
        // Узнаем id выбранной фирмы
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        // Выборка из БД. Переменная для каждой категории
        $item_res = DB::table('model_description')
            ->where('firm_name', $selected_firm_id)
            ->select('name', 'description')
            ->first();


        $phpWord = new \PhpOffice\PhpWord\PhpWord();

        $phpWord->setDefaultFontName('Times New Roman');

        // New section
        $sectionStyle = array(
            'orientation' => 'landscape',
        );
        $section = $phpWord->addSection($sectionStyle);
        $section->addText('Uzņēmuma apraksts', array('size' => 16, 'bold' => true, 'align' => 'center'), array('align' => 'center', 'spaceAfter' => 500));

        // Контент
        $TitlefontStyle = array('color' => '000000', 'size' => 12, 'bold' => true);
        $phpWord->addTitleStyle(1, $TitlefontStyle);
        $section->addTitle('Uzņēmuma nosaukums:', 1);

        $TextfontStyle = array('size'=>12);
        $phpWord->addParagraphStyle('p2Style', array('align'=>'both', 'spaceAfter'=>500));
        $section->addText($item_res->name, $TextfontStyle, 'p2Style'); //Массив с параметрами форматирования передается при создании

        //
        $TitlefontStyle = array('color' => '000000', 'size' => 12, 'bold' => true);
        $phpWord->addTitleStyle(1, $TitlefontStyle);
        $section->addTitle('Uzņēmuma apraksts:', 1);

        $phpWord->addParagraphStyle(
            'leftTab',
            array('tabs' => array(new \PhpOffice\PhpWord\Style\Tab('left', 1550)))
        );
        $TextfontStyle = array('size'=>12);
        $phpWord->addParagraphStyle('p2Style', array('align'=>'both', 'spaceAfter'=>100));
        $section->addText(
            $item_res->description,
            $TextfontStyle,
            array(
                'align'=>'both', 'spaceAfter'=>100,
                'indentation' => array('firstLine' => 600)
            )
        );

//        $section->addText(
//            'Re: Your Application for Post of Security Guard',
//            array('bold' => true),
//            array(
//                'space' => array('before' => 360, 'after' => 280),
//                'indentation' => array('left' => 540, 'right' => 120)
//            )
//        );

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('TestWordFile.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('TestWordFile.docx'));
    }
}
