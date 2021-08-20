<?php
use App\Http\Controllers\ShowModel3DController;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;



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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [WelcomeController::class, 'index'])->name('welcome');
Route::get('blog/posts/{post}', [App\Http\Controllers\Blog\PostController::class, 'show']);
Route::get('blog/category/{category}', [App\Http\Controllers\Blog\PostController::class, 'category']);
Route::get('blog/tag/{tag}', [App\Http\Controllers\Blog\PostController::class, 'tag']);

Route::get('showmodel', [ShowModel3DController::class, 'index']);

Route::middleware(['auth'])->group(function(){
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('categories/create', [CategoryController::class, 'create']);
    Route::post('categories/store', [CategoryController::class, 'store']);
    Route::get('categories/edit/{id}',[CategoryController::class, 'edit']);
    Route::post('categories/update/{id}',[CategoryController::class, 'update']);
    Route::post('categories/destroy/{id}',[CategoryController::class, 'destroy']);

    Route::get('posts', [PostController::class, 'index']);
    Route::get('posts/create', [PostController::class, 'create']);
    Route::post('posts/store', [PostController::class, 'store']);
    Route::get('posts/edit/{id}',[PostController::class, 'edit']);
    Route::post('posts/update/{id}',[PostController::class, 'update']);
    Route::post('posts/destroy/{id}',[PostController::class, 'destroy']);

    Route::get('tags', [TagsController::class, 'index']);
    Route::get('tags/create', [TagsController::class, 'create']);
    Route::post('tags/store', [TagsController::class, 'store']);
    Route::get('tags/edit/{id}',[TagsController::class, 'edit']);
    Route::post('tags/update/{id}',[TagsController::class, 'update']);
    Route::post('tags/destroy/{id}',[TagsController::class, 'destroy']);

});

Route::middleware(['auth','admin'])->group(function(){
    Route::get('users', [UserController::class, 'index']);
    Route::post('users/changeAdmin/{user}', [UserController::class, 'ChangeAdmin']);
    Route::post('users/changeUser/{user}', [UserController::class, 'changeUser']);
});  

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
