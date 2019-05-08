<?php

namespace App\Http\Controllers\PRO\Ie_matrix\Ife;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetLanguageText;

class EditController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... EDIT ...*/
    public function page_ife_edit($category, $id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Pilna progresa karte" => "/full_progress_map",
            "IFE analīze" => "/my_page/page_ife_list",
            "Redaktors" => "/my_page/page_ife_manage/".$category,
        );
        //--- Для контента
        $item = DB::table('model_ife')
            ->where('id', $id)
            ->select('id', 'item')
            ->first();

        return view('PRO.Ie_matrix.Ife.page_ife_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_ife_update_1(Request $request, $category)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $weight = $data['weight'];
        $rating = $data['rating'];
        $id = $data['id'];
        $count = count($id)-1;

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        for ($i = 0; $i <= $count; $i++)
        {
            DB::table('model_ife')
                ->where('id', $id[$i])
                ->update([
                    'weight' => $weight[$i],
                    'rating' => $rating[$i],
                ]);
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-ife-manage', ['category' => $category])->with('success','Элемент обновлен');
    }

    public function page_ife_update_2(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('model_ife')
            ->where('id', $id)
            ->update([
                'item' => $item
            ]);

        $category = DB::table('model_ife')
            ->where('id', $id)
            ->select('cat')
            ->first();

        /*... Передаем в вид ...*/
        return redirect()->route('page-ife-manage', ['category' => $category->cat])->with('success','Элемент обновлен');
    }
    /*...*/

}