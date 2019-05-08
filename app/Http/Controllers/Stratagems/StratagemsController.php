<?php
/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 19.05.2018
 * Time: 17:32
 */

namespace App\Http\Controllers\Stratagems;

use App\Http\Controllers\Controller;
use DB;


class StratagemsController extends Controller
{
    public function page_stratagems()
    {
        $page_sidebar = "stratagems";
        $page_title = "Стратагемы";
        $page_breadcrumbs = null;

        //--- Для контента
        $stratagems = DB::table('stratagems')->get();
        $stratagems_cat = DB::table('stratagems_cat')->get();


        return view('Stratagems.page_stratagems',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'stratagems' => $stratagems,
            'stratagems_cat' => $stratagems_cat,
        ]);
    }


    public function page_stratagems_list($cat)
    {
        $page_sidebar = "stratagems";
        $page_breadcrumbs = [
            "Стратагемы" => "/page_stratagems"
        ];

        //--- Для контента
        $stratagems = DB::table('stratagems')
            ->where('cat', $cat)
            ->get();
        $stratagems_cat = DB::table('stratagems_cat')->get();

        $get_cat_name = DB::table('stratagems_cat')
            ->where('id', $cat)
            ->first();
        $page_title = $get_cat_name->part_name;

        return view('Stratagems.page_stratagems_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'stratagems' => $stratagems,
            'stratagems_cat' => $stratagems_cat,
        ]);
    }


    /*... SHOW ...*/
    public function page_stratagems_show($id)
    {
        $page_sidebar = "stratagems";

        $stratagems = DB::table('stratagems')
            ->where('id', $id)
            ->first();

        $stratagems_cat = DB::table('stratagems_cat')->get();

        $get_cat_name = DB::table('stratagems_cat')
            ->where('id', $stratagems->cat)
            ->first();
        $cat_name = $get_cat_name->part_name;
        $cat_id = $get_cat_name->id;
        $page_breadcrumbs = [
            "Стратагемы" => "/page_stratagems",
            $cat_name => "/page_stratagems_list/".$cat_id,
        ];

        $page_title = "Стратагема ".$stratagems->number;

        return view('Stratagems.page_stratagems_show',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'stratagems' => $stratagems,
            'stratagems_cat' => $stratagems_cat,
        ]);
    }
    /*...*/
}