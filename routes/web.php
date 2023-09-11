<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;


Route::get('/',[NewsController::class,'home'])->name('home');
Route::post('create',[NewsController::class,'create'])->name('create#page'); //->with(['createStatus'=>'Create success...']);
Route::get('show/{id}',[NewsController::class,'show'])->name('show#page');
Route::get('delete/{id}',[NewsController::class,'delete'])->name('delete#page');
Route::get('edit/page/{id}',[NewsController::class,'edit'])->name('edit#page');
Route::post('update/page/{id}',[NewsController::class,'update'])->name('update#page'); //->with(['updateStatus'=>'Update success...']);
