<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CommentaireController extends Controller {


    public function Page(){
        return view("/ajouter_article");
    }
}
