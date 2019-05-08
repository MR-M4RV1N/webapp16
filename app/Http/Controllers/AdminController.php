<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Gate;
use Auth;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function admin_console()
    {
        // Для заглавия
        $page_title = "Admin panel";
        $sidebar = "admin";

        /* Контент */
        $content = 'This is Admin panel!';

        return view('Admin.page_admin',[
            'page_title' => $page_title,
            'sidebar' => $sidebar,
            'content' => $content
        ]);
    }


    public function admin_console_post(Request $request)
    {
        // Проверка безопасности
        if (Gate::denies('use_admin_functions')) {
            return redirect('page_gate_alert');
        }

        /*... Часть 1 ...*/
        // Данным из POST-а присваеваем переменную
        $data = $request->except('_token');
        // Из переменной выбераем нужную строку
        $konsole_command = $data['command'];

        /*... Часть 2 ...*/
        $answer = '
        ¯`·.웃´¯`·.웃´¯`·.웃´¯`·.웃
        ';

        // Тестовые команды
        if($konsole_command == 'Уничтожить мир')
        {
            $answer = 'Процесс запущен!';
        }
        if($konsole_command == 'Спасти мир')
        {
            $answer = 'Мир спасен. Еле успели.';
        }

        // Команды redirect
        if($konsole_command == 'next')
        {
            return redirect()->route('page-home');
        }
        //
        if($konsole_command == 'content->strategy')
        {
            return redirect()->route('page-categories-strategy-index');
        }
        if($konsole_command == 'content->models')
        {
            return redirect()->route('page-categories-strategy-index');
        }
        if($konsole_command == 'content->stratagems')
        {
            return redirect()->route('page-stratagems-list');
        }
        if($konsole_command == 'content->theories')
        {
            return redirect()->route('page-theories-list');
        }
        //
        if($konsole_command == 'show users')
        {
            return redirect()->route('page-users');
        }
        //
        if($konsole_command == 'exit' or $konsole_command == 'logout')
        {
            Auth::logout();
            return redirect()->route('Landing');
        }

        // Команды answer

        // Команды answer_array
        if($konsole_command == 'show options')
        {
            $answer_array = array (
                "next",
                "show options",
                "exit / logout",
                "content->strategy",
                "content->stratagems",
                "content->theories",
                "show users",
            );

            return view('Admin.page_admin',[
                'command' => $konsole_command,
                'answer_array' => $answer_array,
            ]);
        }

        /*... Передаем в вид ...*/
        return view('Admin.page_admin',[
            'command' => $konsole_command,
            'answer' => $answer,
        ]);

        // return redirect()->route('admin-console', ['command' => $konsole_command])->with('answer', $answer);

    }




// ==================================================



    public function page_users()
    {
        //--- Page title
        $page_sidebar = "strategy";
        $page_title = "users";
        $page_breadcrumbs = array(
            "Console" => "/admin",
        );

        /* Контент */
        $content = 'All registered users:';
        $users = DB::table('users')->select('type', 'name', 'email')->get();


        return view('Admin.page_users',[
            'page_sidebar' => $page_sidebar,
            'page_title' => $page_title,
            'page_breadcrumbs' => $page_breadcrumbs,
            'content' => $content,
            'users' => $users
        ]);
    }


    public function page_categories()
    {
        // Для заглавия
        $page_title = "Categories";
        $sidebar = "categories";

        /* Контент */
        $content = 'This is categories page!';

        return view('Admin.page_categories',[
            'page_title' => $page_title,
            'sidebar' => $sidebar,
            'content' => $content
        ]);
    }

    public function page_plans()
    {
        // Для заглавия
        $page_title = "Plans";
        $sidebar = "plans";

        /* Контент */
        //
        $content = 'All created plans:';
        //
        $plans = DB::table('user_firms')
            ->join('users', 'user_firms.user_id', '=', 'users.id')
            ->select('user_firms.firm_name', 'users.name')
            ->get();

        return view('Admin.page_plans',[
            'page_title' => $page_title,
            'sidebar' => $sidebar,
            'content' => $content,
            'plans' => $plans
        ]);
    }
}
