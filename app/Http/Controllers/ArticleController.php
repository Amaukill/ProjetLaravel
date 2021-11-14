<?php

namespace App\Http\Controllers;


use App\Models\Article;
use App\Models\Commentaire;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArticleController extends Controller
{
    // création des articles a partir du formulaire récupéré
    public function AddArticle(Request $request){

//vérifie si les valeurs sont bien définie
        $request->validate([
            'name'=> ['required','max:100','min:1'],
            'price'=> ['required','max:100','min:1'],
            'description'=> ['max:500','min:0'],
            'id'=> ['required','max:999','min:1'],

        ]);
// création de l'article  et du log puis retour a la liste des articles
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
    // fonction qui récupère le formulaire et l'id de l'article à modifier
    public function ModifyArticle(Request $request, $id){
        $article=Article::find($id);
        $request->validate([
            'name'=> ['max:100','min:0'],
            'price'=> ['max:100','min:0'],
            'description'=> ['max:500','min:0'],
            'id_cat'=> ['max:100','min:0'],
        ]);
        // update en fonction des valeurs récupéré
        $modif = '';
        if(is_null($request->name) == false) {
            $article->name=$request->name;
            $modif .= $request->name;
        }
        if (is_null($request->name) == false && is_null($request->price) == false){
            $modif .=',';
        }
        if(is_null($request->price) == false) {
            $article->price=$request->price;
            $modif .= $request->price;
        }
        if (is_null($request->name) == false && is_null($request->price) == false && is_null($request->description) == false){
            $modif .=',';
        }
        if(is_null($request->description) == false) {
            $article->description=$request->description;
            $modif .= $request->description;
        }
        // création du log
        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Modification',
            'new_value'=> $modif,
            'item_type'=>"articles",
            'item_id'=> $article->id,
        ]);
        $article->latest_log_modification= $log->id ;
        $article->save();
        //retour sur la page de modification avec les valeurs modifié
        return $this->GetArticleById($id);
    }

    public function GetArticles(){
        $articles = Article::all();
        return view("articles", compact('articles'));
    }
    //récupération d'un article précis
    public function GetArticleById($id){
        $article = Article::find($id);
        return view("modify_article", compact('article','id'));
    }
    //récupération des articles appartenant à l'id de la catégorie récupéré
    public function GetArticleByCat($id){
        $articles = Article::where('categorie_id', $id)->get();
        return view('articles',compact('articles', 'id'));
    }
    public function Page(){
        return view("/ajouter_article");
    }
}
