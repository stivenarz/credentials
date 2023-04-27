<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function(){
    if(auth()->user()){
        return view('credentials');
    }else{
        return view('auth.login');
    }
})->name('index');

Auth::routes();

Route::view('/prueba', 'prueba')->name('prueba');
