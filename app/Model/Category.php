<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $fillable = ['category', 'status'];

    public function articles() {
        return $this->hasMany(Articles::class, 'categories_id');
    }
}
