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
Route::get('/games/filter', [GameController::class, 'filter'])->name('games.filter');

Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
Route::post('/games', [GameController::class, 'store'])->name('games.store');

Route::get('/games/edit', [GameController::class, 'edit'])->name('games.edit');
Route::put('/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::delete('/games/{game}', [GameController::class, 'destroy'])->name('games.delete');

Route::post('/games/comment', [GameController::class, 'comment'])->name('games.comment');

//categories
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');

Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get('/categories/edit', [CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

//Plataforms
Route::get('/plataforms', [PlataformController::class, 'index'])->name('plataforms.index');

Route::get('/plataforms/create', [PlataformController::class, 'create'])->name('plataforms.create');
Route::post('/plataforms', [PlataformController::class, 'store'])->name('plataforms.store');

Route::get('/plataforms/edit', [PlataformController::class, 'edit'])->name('plataforms.edit');
Route::put('/plataforms/{category}', [PlataformController::class, 'update'])->name('plataforms.update');

Route::delete('/plataforms/{category}', [PlataformController::class, 'destroy'])->name('plataforms.delete');
