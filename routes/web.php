<?php

use App\Http\Controllers\GameController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlataformController;

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

//games
Route::get('/games', [GameController::class, 'index'])->name('games.index');
Route::get('/games/{game}', [GameController::class, 'show'])->name('games.show');
Route::get('/games/category/{name}', [GameController::class, 'categoryFilter'])->name('games.category');
Route::get('/filter', [GameController::class, 'filter'])->name('games.filter');

Route::get('/admin/games', [GameController::class, 'gameList'])->name('games.admin.list');
Route::get('/admin/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/admin/games', [GameController::class, 'store'])->name('games.store');

Route::get('/admin/games/edit/{game}', [GameController::class, 'edit'])->name('games.edit');
Route::put('/admin/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::delete('/admin/games/{game}', [GameController::class, 'destroy'])->name('games.delete');

Route::post('/games/comment', [GameController::class, 'comment'])->name('games.comment'); //$game->users()->attach(2,['is_purchased' => false, 'comment'=> 'dasdsa'])

Route::post('/email', [GameController::class, 'email'])->name('games.email');
//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/admin/categories', [CategoryController::class, 'categoryList'])->name('categories.admin.list');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/admin/categories/edit/{category}', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

//Plataforms
Route::get('/plataforms', [PlataformController::class, 'index'])->name('plataforms.index');

Route::get('/admin/plataforms', [PlataformController::class, 'plataformList'])->name('plataforms.admin.list');
Route::get('/admin/plataforms/create', [PlataformController::class, 'create'])->name('plataforms.create');
Route::post('/admin/plataforms', [PlataformController::class, 'store'])->name('plataforms.store');

Route::get('/admin/plataforms/edit/{plataform}', [PlataformController::class, 'edit'])->name('plataforms.edit');
Route::put('/admin/plataforms/{plataform}', [PlataformController::class, 'update'])->name('plataforms.update');

Route::delete('/admin/plataforms/{plataform}', [PlataformController::class, 'destroy'])->name('plataforms.delete');
