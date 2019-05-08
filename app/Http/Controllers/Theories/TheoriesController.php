<?php
/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 19.05.2018
 * Time: 17:32
 */

namespace App\Http\Controllers\Theories;

use DB;
use App\Theory;
use App\TheoryCategory;

class TheoriesController
{
    public function page_theories()
    {
        $page_sidebar = "theories";
        $page_title = "Главные концепции менеджмента";
        $page_breadcrumbs = null;

        //--- Для меню
        $theories_category = TheoryCategory::all();

        return view('Theories.page_theories',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'theories_category' => $theories_category,
        ]);
    }


    public function page_theories_category($cat)
    {
        $page_sidebar = "theories";
        $theory_cat_title = TheoryCategory::where('id', $cat)->first();
        $page_title = $theory_cat_title->category;
        $page_breadcrumbs = array(
            "Главные концепции менеджмента" => "/page_theories",
        );

        //--- Для меню
        $theories_category = TheoryCategory::all();
        //--- Для контента
        $theories = Theory::where('category_id', $cat)->get();

        return view('Theories.page_theories_category',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'theories' => $theories,
            'theories_category' => $theories_category,
            'theory_cat_title' => $theory_cat_title,
        ]);
    }


    /*... SHOW ...*/
    public function page_theories_show($cat, $id)
    {
        $page_sidebar = "theories";
        $page_title = "Статья";
        $theory_cat_title = TheoryCategory::where('id', $cat)->first();
        $page_breadcrumbs = array(
            "Главные концепции менеджмента" => "/page_theories",
            $theory_cat_title->category => "/page_theories_category/".$cat,
        );

        //--- Для меню
        $theories_category = TheoryCategory::all();
        //--- Для контента
        $theories = Theory::where('id', $id)->get();

        return view('Theories.page_theories_show',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'theories_category' => $theories_category,
            'theories' => $theories[0],
        ]);
    }
    /*...*/
}