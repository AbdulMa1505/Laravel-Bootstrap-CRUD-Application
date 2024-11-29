<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatgoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('category',CatgoryController::class);