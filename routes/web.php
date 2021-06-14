<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\PlataformController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\CommentController;

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



Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	//games
require __DIR__.'/auth.php';
Route::get(LaravelLocalization::transRoute('routes.games.index'), [GameController::class, 'index'])->name('games.index');
Route::get(LaravelLocalization::transRoute('routes.games.show'), [GameController::class, 'show'])->name('games.show');
Route::get(LaravelLocalization::transRoute('routes.games.categoryFilter'), [GameController::class, 'categoryFilter'])->name('games.category');
Route::get(LaravelLocalization::transRoute('routes.games.plataformFilter'), [GameController::class, 'plataformFilter'])->name('games.plataform');
Route::get(LaravelLocalization::transRoute('routes.games.filter'), [GameController::class, 'filter'])->name('games.filter');

Route::get(LaravelLocalization::transRoute('routes.games.admin.list'), [GameController::class, 'gameList'])->name('games.admin.list')->middleware('auth');
Route::get(LaravelLocalization::transRoute('routes.games.admin.create'), [GameController::class, 'create'])->name('games.create')->middleware('auth');
Route::post('/admin/games', [GameController::class, 'store'])->name('games.store')->middleware('auth');

Route::get(LaravelLocalization::transRoute('routes.games.admin.edit'), [GameController::class, 'edit'])->name('games.edit')->middleware('auth');
Route::put('/admin/games/{game}', [GameController::class, 'update'])->name('games.update')->middleware('auth');

Route::delete('/admin/games/{game}', [GameController::class, 'destroy'])->name('games.delete')->middleware('auth');

Route::post('/games/comment', [GameController::class, 'comment'])->name('games.comment'); //$game->users()->attach(2,['is_purchased' => false, 'comment'=> 'dasdsa'])

Route::post('/email', [GameController::class, 'email'])->name('games.email');
//categories
Route::get(LaravelLocalization::transRoute('routes.categories'), [CategoryController::class, 'index'])->name('categories.index');

Route::get(LaravelLocalization::transRoute('routes.categories.admin.list'), [CategoryController::class, 'categoryList'])->name('categories.admin.list')->middleware('auth');
Route::get(LaravelLocalization::transRoute('routes.categories.admin.create'), [CategoryController::class, 'create'])->name('categories.create')->middleware('auth');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware('auth');

Route::get(LaravelLocalization::transRoute('routes.categories.admin.edit'),[CategoryController::class, 'edit'])->name('categories.edit')->middleware('auth');
Route::put('/admin/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware('auth');

Route::delete('/admin/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.delete')->middleware('auth');

//Plataforms
Route::get(LaravelLocalization::transRoute('routes.plataforms'), [PlataformController::class, 'index'])->name('plataforms.index');

Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.list'), [PlataformController::class, 'plataformList'])->name('plataforms.admin.list')->middleware('auth');
Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.create'), [PlataformController::class, 'create'])->name('plataforms.create')->middleware('auth');
Route::post('/admin/plataforms', [PlataformController::class, 'store'])->name('plataforms.store')->middleware('auth');

Route::get(LaravelLocalization::transRoute('routes.plataforms.admin.edit'), [PlataformController::class, 'edit'])->name('plataforms.edit')->middleware('auth');
Route::put('/admin/plataforms/{plataform}', [PlataformController::class, 'update'])->name('plataforms.update')->middleware('auth');

Route::delete('/admin/plataforms/{plataform}', [PlataformController::class, 'destroy'])->name('plataforms.delete')->middleware('auth');

//PAGOS
Route::get(LaravelLocalization::transRoute('routes.payments.index'), [PaymentController::class, 'payment'])->name('payments.index')->middleware('auth');
Route::post(LaravelLocalization::transRoute('routes.payments.store'), [PaymentController::class, 'paymentStore'])->name('payments.store')->middleware('auth');

//CHAT
Route::get(LaravelLocalization::transRoute('routes.chat.list'), [RoomController::class, 'list'])->name('chat.list')->middleware('auth');;
Route::get(LaravelLocalization::transRoute('routes.chat.index'), [RoomController::class, 'index'])->name('chat.index')->middleware('auth');;


//Mail
Route::post(LaravelLocalization::transRoute('routes.mail.store'), [ContactController::class, 'store'])->name('mail.store');
Route::get(LaravelLocalization::transRoute('routes.mail.index'), [ContactController::class, 'index'])->name('mail.index');


//Comment
Route::post('/comments/{game}', [CommentController::class, 'store'])->name('comment.store');
Route::get(LaravelLocalization::transRoute('routes.comment.index'), [CommentController::class, 'index'])->name('comment.index')->middleware('auth');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comment.delete')->middleware('auth');

});

