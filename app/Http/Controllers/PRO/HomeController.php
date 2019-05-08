<?php

namespace App\Http\Controllers\PRO;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\MyFunctions\GetSelectedFirm;
use App\Http\MyFunctions\GetProgress;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }



    public function page_home()
    {
        $page_sidebar = "home";
        $page_title = "Home";
        $page_breadcrumbs = null;

        //--- Для контента
        $user_id = Auth::user()->id;
        $user_firm_result = DB::table('user_firms')->where('user_id', $user_id)->get();
        $user_firm_count = $user_firm_result->count();
        // Язык
        $user = Auth::user()->name;
        $language_result = DB::table('user_selected_language')->where('user', $user)->get();
        if(isset($language_result[0]->selected_language) && !empty($language_result[0]->selected_language))
        {
            $language = $language_result[0]->selected_language;
        }
        else
        {
            $language = "Default";
        }
        //
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        // Сколько моделей было заполненно в разделе "Canvas"
        $check_canvas_total = GetProgress::check_canvas_total();

        return view('PRO.page_home',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'language' => $language,
            'selected_firm_name' => $selected_firm_name,
            'user_firm_count' => $user_firm_count,
            'check_canvas_total' => $check_canvas_total,
        ]);
    }


    public function page_language()
    {
        $page_sidebar = "home";
        $page_title = "Language";
        $page_breadcrumbs = array(
            "Home" => "/page_home",
        );

        //--- Для контента
        // Список языков
        $languages_result = DB::table('languages')->get();
        // Выбранный язык
        $selected_language_result = DB::table('user_selected_language')->get();
        // Содержимое переменной
        if(isset($selected_language_result[0]->selected_language) && !empty($selected_language_result[0]->selected_language))
        {
            $selected_language = $selected_language_result[0]->selected_language;
        }
        else
        {
            $selected_language = "Default";
        }

        return view('PRO.page_language',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'languages' => $languages_result,
            'selected_language' => $selected_language,
        ]);
    }

    public function page_language_update(Request $request)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $selected_language = $data['selected_language'];
        $user = Auth::user()->name;

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        $find_record_result = DB::table('user_selected_language')->where('user', $user)->get();
        $find_record_arr = $find_record_result->toArray();
        if ($find_record_arr == null)
        {
            DB::table('user_selected_language')
                ->insert([
                    'user' => $user,
                    'selected_languge' => $selected_language
                ]);

            return redirect()->route('page-home')->with('success','Language is selected');
        }
        else
        {
            DB::table('user_selected_language')
                ->where('user', $user)
                ->update([
                    'user' => $user,
                    'selected_language' => $selected_language
                ]);

            return redirect()->route('page-home')->with('success','Language is selected');
        }
    }
}
