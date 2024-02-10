<?php

use App\Http\Controllers\AdvertController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FavoriteProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/profile/{user}', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile.show');
Route::get('/adverts/{advert}', [App\Http\Controllers\AdvertController::class, 'index'])->name('advert.show');
Route::get('/a/create', [App\Http\Controllers\MakeAdvertController::class, 'create']);
Route::post('/a', [App\Http\Controllers\MakeAdvertController::class, 'store']);
Route::get('/adverts/{advert}/edit', [App\Http\Controllers\AdvertController::class, 'edit'])->name('advert.edit');
Route::patch('/adverts/{advert}', [App\Http\Controllers\AdvertController::class, 'update'])->name('advert.update');
Route::delete('/adverts/{advert}/delete', [App\Http\Controllers\AdvertController::class, 'delete'])->name('advert.delete');
Route::get('/search/{string?}', [App\Http\Controllers\AdvertController::class, 'search'])->name('advert.search');
Route::middleware(['auth'])->group(function () {
   // Route::get('/favorites/{id}', [FavoriteProductController::class, 'addToFavorites'])->name('favorites.add');
    Route::get('/favorites', [FavoriteProductController::class, 'showFavorites'])->name('favorites.show');
   // Route::get('/favorites/delete/{id}', [FavoriteProductController::class, 'deleteFavorite'])->name('favorites.delete');

    //Route::post('/favorites/add/{advertId}', 'FavoriteProductController@addToFavorites');
    //Route::post('/favorites/delete/{advertId}', 'FavoriteProductController@deleteFavorite');

    Route::post('/favorites/add/{advertId}', [FavoriteProductController::class, 'addToFavorites'])->name('favorites.add');
    Route::post('/favorites/delete/{advertId}', [FavoriteProductController::class, 'deleteFavorite'])->name('favorites.delete');
    Route::post('/favorites/toggle/{advertId}', [FavoriteProductController::class, 'toggleFavorite'])->name('favorites.toggle');


});
Route::get('/search', [AdvertController::class, 'search'])->name('search');


