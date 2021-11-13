<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\Console\Input\Input;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/categories',[CategorieController::class,'GetCategorie'])->middleware(['auth'])->name('categories');
require __DIR__.'/auth.php';

Route::get('/ajouter_categorie',function(){
    return view('ajouter_categorie');
})->middleware(['auth'])->name('ajouter_categorie');
require __DIR__.'/auth.php';

Route::get('/articles',function(){
    return view('articles');
})->middleware(['auth'])->name('articles');
require __DIR__.'/auth.php';

Route::get('/searchCat',[CategorieController::class,'GetCategorie'])->name('getCategorie');
Route::post('/ajoutCat',[CategorieController::class, 'AddCategorie'])->name('ajoutCategorie');
Route::get('/searchArt',[ArticleController::class,'GetArticle'])->name('getArticle');
Route::post('/ajoutArt',[ArticleController::class,'AddArticle'])->name('ajoutArticle');
Route::get('/getArticleByCat/{id}',[ArticleController::class,'GetArticleByCat'])->name('getArticleByCat');

