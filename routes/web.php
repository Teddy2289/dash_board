<?php

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

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','is_admin']],function (){
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'dashboard'])->name('dashboard');

    ############## USER ROUTE ##########
    Route::get('/user',[App\Http\Controllers\dashBoardController::class,'user' ])->name('user');
    Route::get('/edit-user/{id}',[App\Http\Controllers\dashBoardController::class,'edit_user' ])->name('edit-user');
    Route::get('/list_users',[App\Http\Controllers\dashBoardController::class,'list_user' ])->name('list_users');
    Route::put('/update_user/{id}',[App\Http\Controllers\dashBoardController::class,'update_user' ])->name('update_user');
    Route::delete('/delete_user/{id}',[App\Http\Controllers\dashBoardController::class,'delete_users' ])->name('delete_user');
    Route::post('/create/',[App\Http\Controllers\dashBoardController::class,'create' ])->name('create');
});


