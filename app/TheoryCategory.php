<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TheoryCategory extends Model
{
    protected $table = 'theories_cat';

    public $fillable = [
        'id',
        'category',
    ];
}
