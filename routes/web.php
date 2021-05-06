<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlataformController;
use App\Http\Controllers\CategoryController;
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

require __DIR__.'/auth.php';

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	//games
Route::get(LaravelLocalization::transRoute('routes.games.index'), [GameController::class, 'index'])->name('games.index');
Route::get(LaravelLocalization::transRoute('routes.games.show'), [GameController::class, 'show'])->name('games.show');
Route::get(LaravelLocalization::transRoute('routes.games.categoryFilter'), [GameController::class, 'categoryFilter'])->name('games.category');
Route::get(LaravelLocalization::transRoute('routes.filter'), [GameController::class, 'filter'])->name('games.filter');

Route::get(LaravelLocalization::transRoute('routes.games.admin.list'), [GameController::class, 'gameList'])->name('games.admin.list');
Route::get(LaravelLocalization::transRoute('routes.games.admin.create'), [GameController::class, 'create'])->name('games.create');
Route::post('/admin/games', [GameController::class, 'store'])->name('games.store');

Route::get(LaravelLocalization::transRoute('routes.games.admin.edit'), [GameController::class, 'edit'])->name('games.edit');
Route::put('/admin/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::delete('/admin/games/{game}', [GameController::class, 'destroy'])->name('games.delete');

Route::post('/games/comment', [GameController::class, 'comment'])->name('games.comment'); //$game->users()->attach(2,['is_purchased' => false, 'comment'=> 'dasdsa'])

Route::post('/email', [GameController::class, 'email'])->name('games.email');
//categories
Route::get(LaravelLocalization::transRoute('routes.categories'), [CategoryController::class, 'index'])->name('categories.index');

Route::get(LaravelLocalization::transRoute('routes.categories.admin.list'), [CategoryController::class, 'categoryList'])->name('categories.admin.list');
Route::get(LaravelLocalization::transRoute('routes.categories.admin.create'), [CategoryController::class, 'create'])->name('categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store');

Route::get(LaravelLocalization::transRoute('routes.categories.admin.edit'),[CategoryController::class, 'edit'])->name('categories.edit');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete');

//Plataforms
Route::get(LaravelLocalization::transRoute('routes.plataforms'), [PlataformController::class, 'index'])->name('plataforms.index');

Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.list'), [PlataformController::class, 'plataformList'])->name('plataforms.admin.list');
Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.create'), [PlataformController::class, 'create'])->name('plataforms.create');
Route::post('/admin/plataforms', [PlataformController::class, 'store'])->name('plataforms.store');

Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.edit'), [PlataformController::class, 'edit'])->name('plataforms.edit');
Route::put('/admin/plataforms/{plataform}', [PlataformController::class, 'update'])->name('plataforms.update');

Route::delete('/admin/plataforms/{plataform}', [PlataformController::class, 'destroy'])->name('plataforms.delete');

//PAGOS
Route::get(LaravelLocalization::transRoute('routes.payments.index'), [GameController::class, 'payment'])->name('payments.index');
Route::post(LaravelLocalization::transRoute('routes.payments.store'), [GameController::class, 'paymentStore'])->name('payments.store');

});

