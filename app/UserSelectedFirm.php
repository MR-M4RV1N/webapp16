<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class UserSelectedFirm extends Model
{
    protected $table = 'user_selected_firm';

    public $fillable = [
        'user',
        'selected_firm,'
    ];
}
