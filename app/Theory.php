<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Theory extends Model
{
    public $fillable = [
        'title',
        'author',
        'category',
        'tags',
        'description',
        'text',
        'updated_at',
        'created_at',
    ];
}
