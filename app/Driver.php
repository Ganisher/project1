<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'idCard',
        'carManufacturer',
        'carModel',
    ];
}
