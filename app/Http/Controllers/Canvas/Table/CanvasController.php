<?php

namespace App\Http\Controllers\Canvas\Table;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;

class CanvasController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    /*... READ ...*/
    public function canvas_table_list($cat)
    {
        //- Для treeview (partials/blocks_test/treeview.blade.php)
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //-- Узнаем какая фирма была выбранна
        $user = Auth::user()->name;
        $selected_firm_result = DB::table('user_selected_firm')
            ->select('selected_firm')
            ->where('user', $user)
            ->first();
        $selected_firm = $selected_firm_result->selected_firm;

        //- Для заглавия (partials/blocks_test/content_snip_before.blade.php)
        $selected_firm_title_result = DB::table('user_firms')
            ->select('firm_name')
            ->where('id', $selected_firm)
            ->first();
        $page_title = $selected_firm_title_result->firm_name;

        //--- Для контента
        $table_models_text = DB::table('table_model_text')
            ->where('model_name', 'canvas')
            ->where('firm_name', $selected_firm)
            ->first();

        $firm_canvas_result = DB::table('firm_canvas')
            ->where('firm_name', $selected_firm)
            ->get();

        $firm_canvas_kp_result = DB::table('firm_canvas')->where('category', 'kp')->where('firm_name', $selected_firm)->count();
        $firm_canvas_kd_result = DB::table('firm_canvas')->where('category', 'kd')->where('firm_name', $selected_firm)->count();
        $firm_canvas_cp_result = DB::table('firm_canvas')->where('category', 'cp')->where('firm_name', $selected_firm)->count();
        $firm_canvas_vk_result = DB::table('firm_canvas')->where('category', 'vk')->where('firm_name', $selected_firm)->count();
        $firm_canvas_ps_result = DB::table('firm_canvas')->where('category', 'ps')->where('firm_name', $selected_firm)->count();
        $firm_canvas_kr_result = DB::table('firm_canvas')->where('category', 'kr')->where('firm_name', $selected_firm)->count();
        $firm_canvas_ks_result = DB::table('firm_canvas')->where('category', 'ks')->where('firm_name', $selected_firm)->count();
        $firm_canvas_si_result = DB::table('firm_canvas')->where('category', 'si')->where('firm_name', $selected_firm)->count();
        $firm_canvas_pd_result = DB::table('firm_canvas')->where('category', 'pd')->where('firm_name', $selected_firm)->count();


        return view('BA.Canvas.Table.canvas_table_list',[
            // Для treeview
            'catt' => $catt,
            'subb' => $subb,
            // Для treeview - чтобы видеть в какой категории нахожусь
            'cat' => $cat,
            // Для заглавия
            'page_title' => $page_title,
            // Для контента
            'firm_canvas_result' => $firm_canvas_result,

            'table_models_text' => $table_models_text,

            'firm_canvas_kp_result' => $firm_canvas_kp_result,
            'firm_canvas_kd_result' => $firm_canvas_kd_result,
            'firm_canvas_cp_result' => $firm_canvas_cp_result,
            'firm_canvas_vk_result' => $firm_canvas_vk_result,
            'firm_canvas_ps_result' => $firm_canvas_ps_result,
            'firm_canvas_kr_result' => $firm_canvas_kr_result,
            'firm_canvas_ks_result' => $firm_canvas_ks_result,
            'firm_canvas_si_result' => $firm_canvas_si_result,
            'firm_canvas_pd_result' => $firm_canvas_pd_result,
        ]);
    }


    public function canvas_table_edit($cat, $canvas_block)
    {
        //- Для treeview (partials/blocks_test/treeview.blade.php)
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();

        //-- Узнаем какая фирма была выбранна
        $user = Auth::user()->name;
        $selected_firm_result = DB::table('user_selected_firm')
            ->select('selected_firm')
            ->where('user', $user)
            ->first();
        $selected_firm = $selected_firm_result->selected_firm;

        //- Для заглавия (partials/blocks_test/content_snip_before.blade.php)
        $selected_firm_title_result = DB::table('user_firms')
            ->select('firm_name')
            ->where('id', $selected_firm)
            ->first();
        $page_title = $selected_firm_title_result->firm_name;

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)
        // Выбераем запись из БД
        $firm_canvas_result = DB::table('firm_canvas')
            ->where('firm_name', $selected_firm)
            ->where('category', $canvas_block)
            ->select('id', 'item')
            ->get();

        return view('BA.Canvas.Table.canvas_table_edit',[
            // Для treeview
            'catt' => $catt,
            'subb' => $subb,
            // Для treeview - чтобы видеть в какой категории нахожусь
            'cat' => $cat,
            // Для заглавия
            'page_title' => $page_title,
            // Для контента
            'canvas_block' => $canvas_block,
            'firm_canvas_result' => $firm_canvas_result,
        ]);
    }


    /*... CREATE ...*/
    public function canvas_table_crud_create($cat, $canvas_block)
    {
        //--- Для treeview (partials/blocks_test/treeview.blade.php)
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();
        //--- Для заглавия (partials/blocks_test/content_snip_before.blade.php)
        $page_title = "Mērķi";

        //--- Для контента (BA/Svid/svid_tows_list.blade.php)


        return view('BA.Canvas.Table.canvas_table_crud_create',[
            // Для treeview
            'catt' => $catt,
            'subb' => $subb,
            // Для treeview - чтобы видеть в какой категории нахожусь
            'cat' => $cat,
            // Для заглавия
            'page_title' => $page_title,
            // Для контента
            'canvas_block' => $canvas_block,
        ]);
    }


    /*... STORE ...*/
    public function canvas_table_crud_store(Request $request, $cat, $canvas_block)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Выбираем строчку и присваеваем переменную
        $item = $data['item'];


        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('firm_canvas')
            ->insert([
                'category' => $canvas_block,
                'item' => $item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('canvas_table_edit', ['cat' => $cat, 'canvas_block' => $canvas_block])->with('success','Strategija pievienota');
    }


    /*... UPDATE ...*/
    public function canvas_table_crud_edit($cat, $canvas_block, $id)
    {
        //--- Для treeview (partials/blocks_test/treeview.blade.php)
        $catt = DB::table('category_canvas')->get();
        $subb = DB::table('category_canvas_sub')->where('cat_id', $cat)->get();
        //--- Для заглавия (partials/blocks_test/content_snip_before.blade.php)
        $page_title = "SVID analīze - edit page";

        //--- Для контента (BA/Svid/svid_tows_crud_edit.blade.php)
        $firm_canvas_result = DB::table('firm_canvas')
            ->where('id', $id)
            ->select('item')
            ->first();

        return view('BA.Canvas.Table.canvas_table_crud_edit',[
            // Для treeview
            'catt' => $catt,
            'subb' => $subb,
            // Для treeview - чтобы видеть в какой категории нахожусь
            'cat' => $cat,
            // Для заглавия
            'page_title' => $page_title,
            // Для контента
            'canvas_block' =>  $canvas_block,
            'id' => $id,
            'firm_canvas_result' => $firm_canvas_result
        ]);
    }

    public function canvas_table_crud_update(Request $request, $cat, $canvas_block, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();
        // Выбираем строчку и присваеваем переменную
        $firm_canvas_item = $data['item'];

        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('firm_canvas')
            ->where('id', $id)
            ->update([
                'item' => $firm_canvas_item
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('canvas_table_edit', ['cat' => $cat, ' canvas_block' =>  $canvas_block])->with('success','Элемент обновлен');
    }
    /*...*/


    /*... DELETE ...*/
    public function canvas_table_crud_destroy($cat, $canvas_block, $id)
    {
        // Удаляем элемент
        DB::table('firm_canvas')->where('id', $id)->delete();

        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('canvas_table_edit', ['cat' => $cat, 'canvas_block' => $canvas_block])->with('success','Элемент удален');
    }
    /*...*/
}
