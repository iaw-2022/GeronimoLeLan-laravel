<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GamesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\RunsController;
use App\Models\Game;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::resources([
    '/games' => GamesController::class,
    '/categories' => CategoriesController::class,
    '/runs' => RunsController::class,
]);

Route::post('/runs/validation','App\Http\Controllers\RunsController@validation','$id');

require __DIR__.'/auth.php';
