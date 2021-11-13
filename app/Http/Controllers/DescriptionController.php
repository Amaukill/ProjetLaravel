<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class DescriptionController extends Controller {


    public function GetArticleDescription($id) {
        $SpecificArticle = Article::where('id', $id)->get();

        return view("description",compact('SpecificArticle'));
    }

    public function Page(){
        return view("/ajouter_article");
    }
}
