<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'user_id',
        'name_car',
        'link',
        'year',
        'fuel',
        'doors',
        'mileage',
        'exchange',
        'color',
        'price',
        'updated_at',
        'created_at'
    ];
}