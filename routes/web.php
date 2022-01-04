<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApplicationController;

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

Route::any('/', [ApplicationController::class, 'index'])->name('index');

// basic Information
Route::get('/app/basic-info', [ApplicationController::class, 'basicInfo'])->name('app.basicInfo');
Route::post('/app/basic-info', [ApplicationController::class, 'storeBasicInfo'])->name('app.storeBasicInfo');

// Essential Information
Route::get('/app/essential-info', [ApplicationController::class, 'essentialInfo'])->name('app.essentialInfo');
Route::post('/app/essential-info', [ApplicationController::class, 'storeEssentialInfo'])->name('app.storeEssentialInfo');

// medical history
Route::get('/app/medical-history', [ApplicationController::class, 'medicalHistory'])->name('app.medicalHistory');
Route::post('/app/medical-history', [ApplicationController::class, 'storeMedicalHistory'])->name('app.storeMedicalHistory');

// Lifestyle
Route::get('/app/life-style', [ApplicationController::class, 'lifeStyle'])->name('app.lifeStyle');
Route::post('/app/life-style', [ApplicationController::class, 'lifeStyle'])->name('app.lifeStyle');
