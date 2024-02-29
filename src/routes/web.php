<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ThanksController;
use App\Http\Controllers\ShopAllController;
use App\Http\Controllers\ShopIdController;
use App\Http\Controllers\DoneController;
use App\Http\Controllers\MyPageController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\SearchController;

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



Route::get('/register', [RegisterController::class, 'registerView']);

Route::get('/login', [LoginController::class, 'loginView'])->name('login');

Route::get('/thanks', [ThanksController::class, 'thanksView']);

Route::middleware('auth')->group(function () {
Route::get('/', [ShopAllController::class, 'shopAllView']);
});

Route::get('/detail/:shop_id/{id}', [ShopIdController::class, 'shopIdView']);
Route::post('/done', [ShopIdController::class, 'shopId'])
->name('reservations.index');

Route::get('/done', [DoneController::class, 'doneView'])
->name('done.index');

Route::get('/my_page', [MyPageController::class, 'myPageView']);
Route::delete('/done/{id}', [MyPageController::class, 'destroy']);

Route::post('/favorites/{shop}', [FavoriteController::class, 'store'])
->name('favorites.store');

Route::delete('/favorites/{shop}', [FavoriteController::class, 'destroy'])
->name('favorites.destroy');

Route::get('/search', [SearchController::class, 'search'])->name('search');

Auth::routes();