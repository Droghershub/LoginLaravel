<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

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
Route::get('login', [AuthController::class, 'index'])
    ->middleware('guest')
    ->name('login');

Route::post('login', [AuthController::class, 'login'])
    ->middleware(['guest', 'throttle:2,1'])
    ->name('login');

Route::get('register', [AuthController::class, 'register_view'])
    ->middleware('guest')
    ->name('register');

Route::post('register', [AuthController::class, 'register'])
    ->middleware(['guest', 'throttle:2,1'])
    ->name('register');




Route::group(['middleware'=>'auth'],function(){
    Route::get('home',[AuthController::class,'home'])->name('home');
    Route::get('logout',[AuthController::class,'logout'])->name('logout');
});


#Demo for push


#demo push 
