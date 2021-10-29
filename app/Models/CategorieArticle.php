<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategorieArticle extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function article(){
        return $this->hasOne(Article::class);
    }
    public function categorie(){
        return $this->hasOne(Categorie::class);
    }
}
