<?php

namespace App\Http\MyFunctions;

use DB;
use Auth;

class GetLanguageText
{
    static function table_model_text($model_name)
    {
        // Узнаем выбранный язык
        $selected_language_result = DB::table('user_selected_language')->get();
        if($selected_language_result[0]->selected_language == "Русский")
        {
            $table_models_text_result = DB::table('table_models_text')
                ->where('model_name', $model_name)
                ->select('text_ru')
                ->first();
            $table_models_text = $table_models_text_result->text_ru;
        }
        //
        if($selected_language_result[0]->selected_language == "Latviešu")
        {
            $table_models_text_result = DB::table('table_models_text')
                ->where('model_name', $model_name)
                ->select('text_lv')
                ->first();
            $table_models_text = $table_models_text_result->text_lv;
        }
        //
        if($selected_language_result[0]->selected_language == "English")
        {
            $table_models_text_result = DB::table('table_models_text')
                ->where('model_name', $model_name)
                ->select('text_en')
                ->first();
            $table_models_text = $table_models_text_result->text_en;
        }
        //
        if(empty($selected_language_result[0]->selected_language))
        {
            $table_models_text_result = DB::table('table_models_text')
                ->where('model_name', $model_name)
                ->select('text')
                ->first();
            $table_models_text = $table_models_text_result->text;
        }

        return $table_models_text;
    }
}