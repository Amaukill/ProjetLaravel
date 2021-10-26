<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    public function user(){
        return $this->hasOne(User::class);
    }
    public function article(){
        return $this->hasOne(Article::class);
    }
}