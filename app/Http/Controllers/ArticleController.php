<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function AddArticle(Request $request){
        error_log('Some message here.');

        $request->validate([
            'name'=> ['required','max:100','min:1'],
            'price'=> ['required','max:100','min:1'],
            'id'=> ['required','max:999','min:1'],
        ]);

        $article=Article::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'categorie_id'=>$request->id,
        ]);
        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Create',
            'new_value'=> $article->name,
            'item_type'=>"categories",
            'item_id'=> $article->id,
        ]);
        $article->log_creation = $log->id ;
        $article->save();
        return $this->GetArticleByCat($article->categorie_id);
    }
    public function GetArticle(){

        $articles = Article::all();
        return view("articles", compact('articles'));


    }
    public function GetArticleByCat($id){
        $articles = Article::where('categorie_id', $id)->get();
        return view('articles',compact('articles', 'id'));
    }
    public function Page(){
        return view("/ajouter_article");
    }
}
