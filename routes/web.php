<?php

use App\Http\Controllers\AppDetailController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\GetZipController;

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

Route::get('/', [ApplicationController::class,'index']);
Route::post('/getzip', GetZipController::class);
Route::get('/app/basic-info', [ApplicationController::class,'create']);
Route::post('/app/basic-info',[ApplicationController::class,'store']);
Route::get('/app/essential-info',[AppDetailController::class,'create']);
