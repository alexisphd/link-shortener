<?php

use App\Http\Controllers\LinkController;
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

Route::get('/', [LinkController::class, 'index'])->name('index');
Route::post('/', [LinkController::class,'showLinks'])->name('show.links');
Route::post('/store', [LinkController::class, 'store'])->name('store');
