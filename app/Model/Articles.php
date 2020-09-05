<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = 'articles';
    protected $fillable = ['title', 'slug', 'description', 'image', 'status', 'categories_id'];

    public function category() {
        return $this->belongsTo(Category::class, 'categories_id');
    }
}
