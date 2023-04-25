<?php

use App\Http\Controllers\CirculationController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
});

Route::get('lang/{lang}', ['as' => 'lang.switch', 'uses' => 'App\Http\Controllers\LanguageController@switchLang']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Auth::routes();

Route::resource('users', App\Http\Controllers\UserController::class);


Route::resource('actions', App\Http\Controllers\ActionController::class);


Route::resource('services', App\Http\Controllers\ServiceController::class);


Route::resource('registers', App\Http\Controllers\RegisterController::class);

Route::get('circulation/record/{id}', action: [CirculationController::class, 'recordInRegister'])->name('circulation.record');

Route::patch('circulation/record/{id}', action: [CirculationController::class, 'storeRecorded'])->name('circulation.record.store');

Route::get('circulation/send/{id}', action: [CirculationController::class, 'send'])->name('circulation.send');

Route::patch('circulation/send/{id}', action: [CirculationController::class, 'storeSended'])->name('circulation.send.store');

Route::get('mails/processing/{id}', action: [CirculationController::class, 'processing'])->name('circulation.processing');

Route::patch('circulation/processing/{id}', action: [CirculationController::class, 'storeProcessing'])->name('circulation.processing.store');

Route::resource('mails', App\Http\Controllers\MailController::class);
