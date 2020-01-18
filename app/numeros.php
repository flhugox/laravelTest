<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class numeros extends Model
{
    //
    public $timestamps = false;
    protected $fillable = [
        'numeros',
        'numeros_2',
        'numeros_3'
    ];
}
