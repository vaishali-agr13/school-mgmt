<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MapController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/ola-map', [MapController::class, 'index']);
Route::get('/search-location', [MapController::class, 'searchLocation']);
