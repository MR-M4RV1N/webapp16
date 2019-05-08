<?php

namespace App\Http\Controllers\MyFirms;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Http\Controllers\Controller;
use App\Http\MyFunctions\GetSelectedFirm;

class FirmsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... SHOW ...*/
    public function show($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Parādīt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Uzņēmumu redaktors" => "/page_all_firms",
        );

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $user_firm_result = DB::table('user_firms')->where('id', $id)->get();

        return view('BA.MyFirms.show',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'user_firm_result' => $user_firm_result,
            'selected_firm_name' => $selected_firm_name,
        ]);
    }


    /*... EDIT ...*/
    public function edit($id)
    {
        $page_sidebar = "strategy";
        $page_title = "Rediģēt";
        $page_breadcrumbs = array(
            "Stratēģijas izstrāde" => "/page_firms",
            "Uzņēmumu redaktors" => "/page_all_firms",
        );

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        //--- Для контента
        $user_firm_result = DB::table('user_firms')->where('id', $id)->get();

        return view('BA.MyFirms.edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'id' => $id,
            'user_firm_result' => $user_firm_result,
            'selected_firm_name' => $selected_firm_name,
        ]);
    }


    public function update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $firm_name = $data['firm_name'];
        $firm_description = $data['firm_description'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('user_firms')
            ->where('id', $id)
            ->update([
                'firm_name' => $firm_name,
                'firm_description' => $firm_description,
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('page-all-firms')->with('success','Элемент обновлен');
    }


    /*... CREATE ...*/
    public function create()
    {
        $page_sidebar = "strategy";
        $page_title = "Izveidot jauno uzņēmumu";
        $page_breadcrumbs = null;

        //--- Для меню
        $selected_firm_name = GetSelectedFirm::selected_firm_name();
        if($selected_firm_name == null) {$not_selected = true;} else {$not_selected = false;}
        //--- Для контента


        return view('BA.MyFirms.create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'not_selected' => $not_selected,
            'selected_firm_name' => $selected_firm_name,
        ]);
    }


    public function store(Request $request, $user_id)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $firm_name = $data['firm_name'];
        $firm_description = $data['firm_description'];

        /*... Часть 2 ...*/
        // Сохранение в БД
        DB::table('user_firms')->insert([
            'user_id' => $user_id,
            'firm_name' => $firm_name,
            'firm_description' => $firm_description
        ]);
        // Проверяем выбранно ли предприятие
        $selected_firm_id = GetSelectedFirm::selected_firm_id();
        // Если не выбранно, то принемаем меры
        if($selected_firm_id == 0)
        {
            // Выбераем первый и единственный документ из БД
            $user_firm_result = DB::table('user_firms')
                ->where('user_id', $user_id)
                ->first();
            // Получаем имя пользователя
            $user_name = Auth::user()->name;
            // Устанавливаем выбранный документ (фирму)
            DB::table('user_selected_firm')->insert([
                'user' => $user_name,
                'selected_firm' => $user_firm_result->id,
            ]);
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-all-firms')->with('success','Элемент добавлен');
    }


    /*... DELETE ...*/
    public function destroy($id)
    {
        // -- Информация о выбранной фирме
        $selected_firm = GetSelectedFirm::selected_firm_id();

        if($selected_firm !== $id)
        {
            // description
            DB::table('model_description')->where('firm_name', $id)->delete();
            DB::table('model_canvas')->where('firm_name', $id)->delete();
            // external_environment
            DB::table('pest')->where('firm_name', $id)->delete();
            DB::table('model_circle')->where('firm_name', $id)->delete();
            DB::table('model_forces')->where('firm_name', $id)->delete();
            DB::table('model_barriers')->where('firm_name', $id)->delete();
            DB::table('model_success')->where('firm_name', $id)->delete();
            DB::table('model_competitors')->where('firm_name', $id)->delete();
            DB::table('model_capabilities')->where('firm_name', $id)->delete();
            // internal_environment
            DB::table('model_resources')->where('firm_name', $id)->delete();
            DB::table('model_abilities')->where('firm_name', $id)->delete();
            DB::table('model_contribution')->where('firm_name', $id)->delete();
            DB::table('model_suggestions')->where('firm_name', $id)->delete();
            // swot
            DB::table('svid_table_1')->where('firm_name', $id)->delete();
            DB::table('svid_table_2')->where('firm_name', $id)->delete();
            DB::table('svid_tows')->where('firm_name', $id)->delete();
            // strategy
            DB::table('model_prieksrocibas')->where('firm_name', $id)->delete();
            DB::table('model_virziens')->where('firm_name', $id)->delete();
            DB::table('model_lidzekli')->where('firm_name', $id)->delete();
            DB::table('strategija_merki')->where('firm_name', $id)->delete();
            // tests
            DB::table('model_skoulz')->where('firm_name', $id)->delete();
            DB::table('model_rumelt')->where('firm_name', $id)->delete();
            DB::table('model_grant')->where('firm_name', $id)->delete();


            /*... Самое главное - удаляем фирму из списка ...*/
            DB::table('user_firms')->where('id', $id)->delete();
            /*...*/

            /* Перенаправляем на главную страницу с сообщением */
            return redirect()->route('page-all-firms')->with('success','Фирма удалена');
        }

        else
        {
            /* Перенаправляем на главную страницу с сообщением */
            return redirect()->route('select-selected-firm')->with('alert','Сначало нужно выбрать фирму по умолчанию.');
        }



    }
    /*...*/
}
