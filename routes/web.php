<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategorieController;
use App\Http\Controllers\DescriptionController;
use App\Http\Controllers\CommentaireController;
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
Route::get('/Modify_Article',function(){
    return view('modify_article');
})->middleware(['auth'])->name('modify_article');

Route::get('/Descriptions',function(){
    return view('Descriptions');
})->middleware(['auth'])->name('Descriptions');
require __DIR__.'/auth.php';


Route::get('/searchCat',[CategorieController::class,'GetCategorie'])->name('getCategorie');
Route::post('/ajoutCat',[CategorieController::class, 'AddCategorie'])->name('ajoutCategorie');
Route::get('/searchArt',[ArticleController::class,'GetArticle'])->name('getArticle');
Route::post('/ajoutArt',[ArticleController::class,'AddArticle'])->name('ajoutArticle');
Route::get('/Article/{id}',[ArticleController::class,'GetArticleByCat'])->name('getArticleByCat');
Route::get('/Article/Descriptions/{id}',[DescriptionController::class,'GetArticleDescription'])->name('getArticleDescription');
Route::post('/ajoutCommentaire',[DescriptionController::class,'ajoutCommentaire'])->name('ajoutCommentaire');
Route::get('/getArticleByCat/{id}',[ArticleController::class,'GetArticleByCat'])->name('getArticleByCat');
Route::get('/ModifyArticle/{id}',[ArticleController::class, 'GetArticleById'])->name('ModifyArticle');
Route::post('/ModifyArticle/{id}',[ArticleController::class, 'ModifyArticle'])->name('ModifyArticleId');
