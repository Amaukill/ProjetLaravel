<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Commentaire;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    public function AddArticle(Request $request){
        $request->validate([
            'name'=> ['required','max:100','min:1'],
            'price'=> ['required','max:100','min:1'],
            'description'=> ['required','integer','not_in:0'],
            'id'=> ['required','max:999','min:1'],
        ]);

        $article=Article::create([
            'name'=>$request->name,
            'price'=>$request->price,
            'categorie_id'=>$request->id,
            'description'=>$request->description,
        ]);
        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Create',
            'new_value'=> $article->name,
            'item_type'=>"articles",
            'item_id'=> $article->id,
        ]);
        $article->log_creation = $log->id ;
        $article->save();
        return $this->GetArticleByCat($article->categorie_id);
    }
    public function ModifyArticle(Request $request, int $id){
        $article=Article::find($id);
        $request->validate([
            'name'=> ['max:100','min:1'],
            'price'=> ['max:100','min:1']
        ]);
        $modif = '';
        if(is_null($request->name) == false) {
            $article->name=$request->name;
            $modif += $request->name;
        }
        if (is_null($request->name) == false && is_null($request->price) == false){
            $modif +=',';
        }
        if(is_null($request->price) == false) {
            $article->prix=$request->price;
            $modif += $request->price;
        }
        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Modification',
            'new_value'=> $modif,
            'item_type'=>"articles",
            'item_id'=> $article->id,
        ]);
        $article->log_modication= $log->id ;
        $article->save();
        return $this->Page();
    }
    public function GetArticle(){
        $articles = Article::all();
        return view("articles", compact('articles'));
    }
    public function GetArticleById(int $id){
        $articles = Article::find($id);
        return view("modify_article", compact('articles'));
    }
    public function GetArticleByCat($id){
        $articles = Article::where('categorie_id', $id)->get();
        return view('articles',compact('articles', 'id'));
    }
    public function Page(){
        return view("/ajouter_article");
    }
}
