<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/cities', [\App\Http\Controllers\CityController::class, 'index']);
Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'index']);
Route::post('/subcategories', [\App\Http\Controllers\SubCategoryController::class, 'index']);
Route::post('/articles', [\App\Http\Controllers\ArticleController::class, 'index']);
Route::get('/article/{slug}', [\App\Http\Controllers\ArticleController::class, 'show']);
