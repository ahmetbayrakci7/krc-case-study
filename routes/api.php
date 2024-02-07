<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/vendor1.xml', function () {
    return file('../vendor1.xml');
});
Route::get('/vendor2.xml', function () {
    return file('../vendor2.xml');
});
Route::get('/vendor3.xml', function () {
    return file('../vendor3.xml');
});
