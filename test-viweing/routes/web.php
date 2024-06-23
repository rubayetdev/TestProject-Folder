<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $role = \App\Models\Roles::all();
    $permission = \App\Models\Permission::all();
    return view('welcome', compact('role', 'permission'));
});

Route::post('/insert',[\App\Http\Controllers\TestCase::class,'insert'])->name('insert');

Route::post('/insert-permission',[\App\Http\Controllers\TestCase::class,'permission'])->name('permission');

Route::get('/product',[\App\Http\Controllers\TestCase::class,'product'])->name('product');

Route::get('/order',[\App\Http\Controllers\TestCase::class,'order'])->name('order');
