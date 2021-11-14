<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Commentaire;
use App\Models\User;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class DescriptionController extends Controller {


    public function GetArticleDescription($id) {
        $SpecificArticle = Article::where('id', $id)->get();
        $Commentaire = Commentaire::where('article_id', $id)->orderBy('created_at', 'desc')->get();
        $login[] = "";
        foreach($Commentaire as $key=>$value) {
            $login[$key] = User::where('id', $value->user_id)->get();
        }
            return view("description",compact('SpecificArticle','Commentaire','login'));
    }

    public function ajoutCommentaire(Request $request) {
        $request->validate([
            'commentaire'=> ['required'],
            'user_id'=>['required'],
            'article_id'=>['required'],
            'note'=>['required',Rule::in('1','2','3','4','5')],
        ]);
        $commentaire=Commentaire::create([
            'commentaire'=>$request->commentaire,
            'user_id'=>$request->user_id,
            'article_id'=>$request->article_id,
            'note'=>$request->note,
        ]);
        return $this->GetArticleDescription($request->article_id);
    }

        public function DeleteCommentByUser_Id($id){
        $commentaire=Commentaire::find($id);
            $articleId= $commentaire->article_id;
            $commentaire->delete();
        return $this->GetArticleDescription($articleId);
        }

}
