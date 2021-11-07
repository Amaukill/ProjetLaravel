<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Article extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];
    public function log(){
        return $this->hasOne(Log::class);
    }
    public function categorie(){
        return $this->hasOne(Categorie::class);
    }
}
