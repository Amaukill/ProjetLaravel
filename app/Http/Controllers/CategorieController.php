<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Log;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategorieController extends Controller
{
    public function AddCategorie(Request $request){
        $request->validate([
            'name'=> ['required','max:100','min:1']
        ]);
        $cat = Categorie::create([
            'name'=>$request->name
        ]);

        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Create',
            'new_value'=> $cat->name,
            'item_type'=>"categories",
            'item_id'=> $cat->id,
        ]);
        $cat->log_creation = $log->id ;
        $cat->save();
        return $this->GetCategorie();
    }
    public function ModifyCategorie(Request $request, $id){
        $categorie=Categorie::find($id);
        $request->validate([
            'name'=> ['max:100','min:0'],
            'price'=> ['max:100','min:0'],
            'description'=> ['max:500','min:0']
        ]);
        // update en fonction des valeurs récupéré
        $modif = '';
        if(is_null($request->name) == false) {
            $categorie->name = $request->name;
            $modif .= $request->name;
        }
        // création du log
        $log = Log::create([
            'user_id'=> auth()->id(),
            'action'=> 'Modification',
            'new_value'=> $modif,
            'item_type'=>"categorie",
            'item_id'=> $categorie->id,
        ]);
            $categorie->latest_log_modification= $log->id ;
            $categorie->save();
        //retour sur la page de modification avec les valeurs modifié
        return $this->GetCategorieById($id);
    }
    public function GetCategorieById($id){
            $categorie = Categorie::find($id);
            return view("modify_categorie", compact('categorie','id'));
    }
    public function GetCategorie(){

       $categorie = Categorie::all();
        return view("categories", compact('categorie'));


    }
    public function Page(){
        return view("/ajouter_categorie");
    }
}
