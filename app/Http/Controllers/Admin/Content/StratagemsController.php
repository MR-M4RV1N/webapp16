<?php
/**
 * Created by PhpStorm.
 * User: aleks
 * Date: 17.05.2018
 * Time: 12:37
 */

namespace App\Http\Controllers\Admin\Content;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\File;

class StratagemsController extends Controller
{
    /*... LIST ...*/
    public function page_stratagems_list()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "content->stratagems";
        $page_breadcrumbs = array(
            "Console" => "/admin",
        );

        //--- Для контента
        $stratagems = DB::table('stratagems')->get();


        return view('Admin.Content.page_stratagems_list',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'stratagems' => $stratagems,
        ]);
    }
    /*...*/


    /*... SHOW ...*/
    public function page_stratagems_show($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "show";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->stratagems" => "/admin/page_stratagems_list",
        );

        //--- Для контента
        $stratagems = DB::table('stratagems')
            ->where('id', $id)
            ->get();

        return view('Admin.Content.page_stratagems_show',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'stratagems' => $stratagems[0],
        ]);
    }
    /*...*/

    /*... CREATE ...*/
    public function page_stratagems_create()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "create";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->stratagems" => "/admin/page_stratagems_list",
        );;

        /*... Код для контента ...*/


        return view('Admin.Content.page_stratagems_create',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента

        ]);
    }

    public function page_stratagems_store(Request $request)
    {
        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');

        /* Сохранение картинки в папку */
        /*...*/
        $schema = $request->file('schema');

        if (isset($schema)) {
            // Валидация картинки
            $this->validate($request, [
                'schema' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Получение расширения загруженного файла
            //$imageName = time().'.'.$request->schema->getClientOriginalExtension();
            $imageName = 'schema'.$data['number'].'.'.$request->schema->getClientOriginalExtension();
            // Сохранение в папку images
            $request->schema->move(public_path('images/Stratagems'), $imageName);
        }
        else {
            $imageName = null;
        }
        /*...*/

        /*... ЧАСТЬ 2 ...*/
        // Сохранение в БД
        DB::table('stratagems')->insert([
            'number' => $data['number'],
            'title' => $data['title'],
            'intro' => $data['intro'],
            'description' => $data['description'],
            'key_elements' => $data['key_elements'],
            'schema' => $imageName,
            'features' => $data['features'],
            'business' => $data['business'],
            'history' => $data['history'],
        ]);


        /*... Передаем в вид ...*/
        return redirect()->route('page-stratagems-list')->with('success','Стратагема добвалена');
    }
    /*...*/


    /*... EDIT ...*/
    public function page_stratagems_edit($id)
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "create";
        $page_breadcrumbs = array(
            "Console" => "/admin",
            "content->stratagems" => "/admin/page_stratagems_list",
        );;

        //--- Для контента
        $item = DB::table('stratagems')
            ->where('id', $id)
            ->first();

        return view('Admin.Content.page_stratagems_edit',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            // Для контента
            'item' => $item,
        ]);
    }

    public function page_stratagems_update(Request $request, $id)
    {
        /*... ЧАСТЬ 1 - Обрабатываем POST ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->all();

        /* Сохранение картинки в папку */
        /*...*/
        $schema = $request->file('schema');

        if (isset($schema)) {
            // Валидация картинки
            $this->validate($request, [
                'schema' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            // Получение расширения загруженного файла
            //$imageName = time().'.'.$request->schema->getClientOriginalExtension();
            $imageName = 'schema'.$data['number'].'.'.$request->schema->getClientOriginalExtension();
            // Сохранение в папку images
            $request->schema->move(public_path('images/Stratagems'), $imageName);
        }
        else {
            $imageName = $data['old_schema'];
        }
        /*...*/


        /*... ЧАСТЬ 2 ...*/
        //Обновляем информацию в БД
        DB::table('stratagems')
            ->where('id', $id)
            ->update([
                'number' => $data['number'],
                'title' => $data['title'],
                'intro' => $data['intro'],
                'description' => $data['description'],
                'key_elements' => $data['key_elements'],
                'schema' => $imageName,
                'features' => $data['features'],
                'business' => $data['business'],
                'history' => $data['history'],
            ]);

        /*... Передаем в вид ...*/
        return redirect()->route('page-stratagems-list')->with('success','Элемент обновлен');
    }
    /*...*/


    /*... DELETE ...*/
    public function page_stratagems_destroy($id)
    {
        // Узнаем имя картинки
        $result = DB::table('stratagems')
            ->where('id', $id)
            ->select('schema')
            ->first();
        // Удаляем картинку
        File::delete('images/Stratagems/'.$result->schema);

        // Удаляем запись
        DB::table('stratagems')->where('id', $id)->delete();


        /* Перенаправляем на главную страницу с сообщением */
        return redirect()->route('page-stratagems-list')->with('success','Элемент удален');
    }
    /*...*/

}