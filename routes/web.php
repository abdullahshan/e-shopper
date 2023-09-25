<?php

use App\Http\Controllers\backend\bannerController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\backend\deshboardController;
use App\Http\Controllers\backend\categoryController;
use App\Http\Controllers\backend\collectionController;
use App\Http\Controllers\backend\postController;
use App\Http\Controllers\backend\subcategoryController;
use App\Http\Controllers\frontend\frontendController;
use App\Models\banner;

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


Auth::routes();

//frontend route//

Route::get('/',[frontendController::class,'index'])->name('frontend.home');
Route::get('shop',[frontendController::class,'shop'])->name('shop.home');
Route::get('about',[frontendController::class,'about'])->name('about.home');
Route::get('cart',[frontendController::class,'cart'])->name('cart.home');
Route::get('contact',[frontendController::class,'contact'])->name('contact.home');
Route::get('search',[frontendController::class,'search'])->name('search.home');
Route::get('single_shop',[frontendController::class,'single_shop'])->name('single_shop.home');



//backend route//

Route::get('/dashboard',[deshboardController::class,'index'])->middleware(['auth', 'verified'])->name('dashboard.home');


Route::prefix('cateory')->name('category.')->group(function () {
    Route::get('add',[categoryController::class,'add'])->name('add');
    Route::post('store',[categoryController::class,'store'])->name('store');
    Route::get('edit/{category:slug}', [categoryController::class,'edit'])->name('edit');

});


Route::prefix('subcategory')->name('subcategory.')->group(function(){

    Route::get('add',[subcategoryController::class,'add'])->name('add');
    Route::post('store',[subcategoryController::class,'store'])->name('store');
    Route::get('edit/{subcategory:slug}',[subcategoryController::class,'edit'])->name('edit');
    Route::post('update/{subcategory:slug}',[subcategoryController::class,'update'])->name('update');




});


Route::prefix('post')->name('post.')->group(function(){

    Route::get('add',[postController::class,'add'])->name('add');
    Route::post('store',[postController::class,'store'])->name('store');
    Route::get('edit/{post:slug}',[postController::class,'edit'])->name('edit');
    Route::post('update/{update:slug}',[postController::class,'update'])->name('update');
    Route::post('update/{update:slug}',[postController::class,'update'])->name('update');
    Route::get('delete/{delete:slug}',[postController::class,'delete'])->name('delete');

});


Route::prefix('banner')->name('banner.')->group(function(){

       Route::get('view',[bannerController::class,'view'])->name('view');
       Route::get('edit/{edit:id}',[bannerController::class,'edit'])->name('edit');
       Route::post('update/{update:id}',[bannerController::class,'update'])->name('update');

});

Route::prefix('collection')->name('collection.')->group(function(){

        Route::get('add',[collectionController::class,'add'])->name('add');
        Route::post('store',[collectionController::class,'store'])->name('store');
});


