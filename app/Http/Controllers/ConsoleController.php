<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gate;

class ConsoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function page_console()
    {
        // Для заглавия
        $page_title = "Page CONSOLE";
        $sidebar = "console";

        /* Контент */
        // Список таблиц в БД
        $content = 'This is console page!';

        return view('Admin.page_console',[
            'page_title' => $page_title,
            'sidebar' => $sidebar,
            'content' => $content
        ]);
    }

    public function page_console_post(Request $request)
    {
        if (Gate::denies('use_admin_functions')) {
            return redirect('page_gate_alert');
        }

        // Для заглавия
        $page_title = "Page CONSOLE";

        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $konsole_command = $data['command'];


        /*... Часть 2 ...*/
        $answer = '
        ¯`·.웃´¯`·.웃´¯`·.웃´¯`·.웃
        ';

        if($konsole_command == 'Уничтожить мир')
        {
            $answer = 'Процесс запущен!';
        }
        if($konsole_command == 'Спасти мир')
        {
            $answer = 'Мир спасен. Еле успели.';
        }


        /*... Передаем в вид ...*/
        return redirect()->route('page-console', ['command' => $konsole_command])->with('answer', $answer);
    }

}
