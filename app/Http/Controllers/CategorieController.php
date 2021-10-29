<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategorieController extends Controller
{
    public function AddCategorie(Request $request){
        $request->validate([
            'name'=> ['required','max:100','min:1']
        ]);
        Categorie::create([
            'name'=>$request->name
        ]);
        return $this->Page();
    }
    public function GetCategorie(){

       $categorie = Categorie::all();
        return view("categories", compact('categorie'));


    }
    public function Page(){
        return view("/ajouter_categorie");
    }
}
