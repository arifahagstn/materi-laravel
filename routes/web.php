<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CastController;
use App\Http\Controllers\GenreController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/form', function () {
//     return view('form');
// })->name('form');

// Route::get('/welcome', function () {
//     return view('welcometest');
// })->name('welcome');

// Route::get('index', function () {
//     return view('index');
// });
Route::get('/', [AuthorController::class, 'index']);
Route::get('/form', [AuthorController::class, 'form'])->name('form');
Route::get('/welcome', [AuthorController::class, 'welcome'])->name('welcome');

Route::get('/index', function() {
    return view('template.master');
});

Route::resource('/cast', CastController::class);
Route::resource('/genre', GenreController::class);