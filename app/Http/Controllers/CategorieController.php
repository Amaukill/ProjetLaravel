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
    public function GetCategorie(){

       $categorie = Categorie::all();
        return view("categories", compact('categorie'));


    }
    public function Page(){
        return view("/ajouter_categorie");
    }
}
