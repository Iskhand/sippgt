<?php

use App\Http\Controllers\AndroidApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('/pekerja', [AndroidApiController::class, 'pekerja'])->name('pekerja');
Route::get('/datalin', [AndroidApiController::class, 'datalin'])->name('datalin');
Route::get('/target', [AndroidApiController::class, 'target'])->name('target');