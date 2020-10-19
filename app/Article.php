<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    public $rules = [
        'name_car' => 'required|min:3|max:100',
        'link' => 'required',
        'year' => 'required|min:4',
        'link' => 'required',
        'fuel' => 'required',
        'doors' => 'required',
        'mileage' => 'required',
        'exchange' => 'required',
        'color' => 'required',
        'price' => 'required'
    ];

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
