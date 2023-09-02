<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;

class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'description', 'image'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }


}
