<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;

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