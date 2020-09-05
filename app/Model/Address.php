<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'adress';
    protected $fillable = ['address', 'city', 'province', 'country'];
}
