<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Faqs extends Model
{
    protected $fillable = ['question', 'answer', 'status'];
}
