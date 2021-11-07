<?php

namespace App\Http\Controllers;


use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function AddArticle(Request $request){
        $request->validate([
            'name'=> ['required','max:100','min:1'],
            'price'=> ['required','max:100','min:1']
        ]);
        Article::create([
            'name'=>$request->name,
            'price'=>$request->price
        ]);
        return $this->Page();
    }
    public function GetArticle(){

        $articles = Article::all();
        return view("articles", compact('articles'));


    }
    public function GetArticleByCat($id){
        $articles = Article::where('categorie_id', $id)->get();
        return view('articles',compact('articles'));
    }
    public function Page(){
        return view("/ajouter_article");
    }
}
