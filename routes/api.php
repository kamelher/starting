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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});




Route::resource('vendeurs', App\Http\Controllers\API\VendeurAPIController::class)
    ->except(['create', 'edit']);

Route::resource('dfms', App\Http\Controllers\API\DfmAPIController::class)
    ->except(['create', 'edit']);

Route::resource('restos', App\Http\Controllers\API\RestoAPIController::class)
    ->except(['create', 'edit']);

Route::resource('mealTypes', App\Http\Controllers\API\MealTypeAPIController::class)
    ->except(['create', 'edit']);


Route::resource('residences', App\Http\Controllers\API\ResidencesAPIController::class)
    ->except(['create', 'edit']);