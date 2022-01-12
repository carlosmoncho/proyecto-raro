<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ProductController;
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

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::resource('product', ProductController::class)->only('update', 'edit')->middleware(['auth','premium','owner:Product']);
Route::resource('product', ProductController::class)->except('update', 'edit','delete')->middleware(['auth','premium']);

Route::resource('shopping', \App\Http\Controllers\HandleMyShopingCartController::class);
Route::resource('offer', \App\Http\Controllers\HandleMyOffersController::class);

Route::get('/productsLikes/{id}', [\App\Http\Controllers\ProductController::class,'like'])->name('product.like');
Route::get('/store', [\App\Http\Controllers\ProductController::class,'store']);
Route::get('/', [\App\Http\Controllers\LandingPage::class,'index']);
Route::get('/index', [\App\Http\Controllers\LandingPage::class,'index']);
Route::get('/populars', [\App\Http\Controllers\LandingPage::class,'showLikes']);
Route::get('/news', [\App\Http\Controllers\LandingPage::class,'showMostNews']);
Route::get('/delete/{id}', [\App\Http\Controllers\ProductController::class,'delete'])->middleware(['auth','premium','owner:Product']);


Route::get('logout', [LoginController::class, 'logout'])->name('logout');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
