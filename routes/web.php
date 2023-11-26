<?php

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

Auth::routes();

Route::get('/profile', [HomeController::class, 'profile'])->name('home')->middleware(['auth','verified']);

//Email verificaiton
Route::get('/email/verify',[HomeController::class,'verify_notice'])->middleware('auth')->name('verification.notice');
Route::get('/email/verify/{id}/{hash}', [HomeController::class,'verify'])->middleware(['auth', 'signed'])->name('verification.verify');
Route::post('/email/verification-notification', [HomeController::class,'verify_resend'])->middleware(['auth'])->name('verification.resend');

//Changing Password
Route::get('/change/password',[HomeController::class,'cng_pass_view'])->middleware(['auth','verified'])->name('change.password');
Route::post('/update/password',[HomeController::class,'update_password'])->middleware(['auth','verified'])->name('update.password');
