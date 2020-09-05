<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Portofolio extends Model
{
    protected $table = 'portofolio';
    protected $fillable = ['title', 'description', 'image'];
}
