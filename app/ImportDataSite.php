<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ImportDataSite extends Model
{
    public $aRegex = [
        'name_car' => '/^[À-ú\w\s.\-]+\s/',
        'year' => '/\d{4}/',
        'mileage' => '/Quilometragem:(\s[\d.]+)/',
        'fuel' => '/Combustível:\s([\w]+)/',
        'exchange' => '/Câmbio:\s([\S]+)/',
        'doors' => '/Portas:\s(\d+)/',
        'color' => '/Cor:\s(\w+)/',
        'price' => '/PREÇO:R\$([\w .]+)/'
    ];

    public $regDomXPath = '//article | //h2/a/@href';
}
