<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
})->name('welcome');

Route::post('/insert',[UserController::class,'insert_user'])->name('insert');

Route::get('/page',[UserController::class,'page_function'])->name('page');

Route::get('/update/{id}',[UserController::class,'updatepage'])->name('update');

Route::get('/delete',[UserController::class,'deletes'])->name('delete');

Route::post('/updates',[UserController::class,'updates'])->name('updates');
