<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SubCategoryController;

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
    return view('welcome');
});

Auth::routes(['register'=>false]);

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware(['auth','verified']);

//Email verificaiton
Route::get('/email/verify',[HomeController::class,'verify_notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [HomeController::class,'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [HomeController::class,'verify_resend'])->middleware(['auth'])->name('verification.resend');

//Changing Password
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/change/password',[HomeController::class,'cng_pass_view'])->name('change.password');
    Route::post('/update/password',[HomeController::class,'update_password'])->name('update.password');
});

//categories
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/categories/show',[CategoryController::class,'index'])->name('categories.index');
    Route::get('/categories/create',[CategoryController::class,'create'])->name('categories.create');
    Route::post('/categories/added',[CategoryController::class,'store'])->name('categories.store');
    Route::post('/categories/destroy',[CategoryController::class,'destroy'])->name('categories.destroy');
    Route::get('/categories/edit/{id}',[CategoryController::class,'edit'])->name('categories.edit');
    Route::post('/categories/update/{id}',[CategoryController::class,'update'])->name('categories.update');
});

//subCategories
Route::middleware(['auth','verified'])->group(function(){
    Route::get('/subCategories/create',[SubCategoryController::class,'create'])->name('subCategories.create');
    Route::post('/subCategories/store',[SubCategoryController::class,'store'])->name('subCategories.store');
    Route::get('/subCategories/index',[SubCategoryController::class,'index'])->name('subCategories.index');
    Route::get('/subCategories/edit/{id}',[SubCategoryController::class,'edit'])->name('subCategories.edit');
    Route::post('/subCategories/update/{id}',[SubCategoryController::class,'update'])->name('subCategories.update');
    Route::post('/subCategories/destroy',[SubCategoryController::class,'destroy'])->name('subCategories.destroy');
});

//__Post__//
Route::middleware(['auth','verified'])->prefix('/post')->group(function(){
    Route::get('/post-all/index',[PostController::class,'index'])->name('post.index');
    Route::get('/insert-post/create',[PostController::class,'create'])->name('post.create');
    Route::post('/post-store/store',[PostController::class,'store'])->name('post.store');
    Route::post('/post-delete/destroy',[PostController::class,'destroy'])->name('post.destroy');
    Route::get('/post-edit/edit/{id}',[PostController::class,'edit'])->name('post.edit');
});