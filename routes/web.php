<?php


use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DocumentController;

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

Route::get('/', [ApplicationController::class, 'zip'])->name('app.zip');
Route::post('/', [ApplicationController::class, 'storeZip'])->name('app.storeZip');

// basic info
Route::get('/application/basic-info', [ApplicationController::class, 'basicInfo'])->name('app.basicInfo');
Route::post('/application/basic-info', [ApplicationController::class, 'storeBasicInfo'])->name('app.storeBasicInfo');

// essential info
Route::get('/application/essential-info', [ApplicationController::class, 'essentialInfo'])->name('app.essentialInfo');
Route::post('/application/essential-info', [ApplicationController::class, 'storeEssentialInfo'])->name('app.storeEssentialInfo');

// medical history
Route::get('/application/medical-history', [ApplicationController::class, 'medicalHistory'])->name('app.medicalHistory');
Route::post('/application/medical-history', [ApplicationController::class, 'storeMedicalHistory'])->name('app.storeMedicalHistory');

// life style
Route::get('/application/life-style', [ApplicationController::class, 'lifeStyle'])->name('app.lifeStyle');
Route::post('/application/life-style', [ApplicationController::class, 'storeLifeStyle'])->name('app.storeLifeStyle');

// email registration
Route::get('/application/register-email', [ApplicationController::class, 'registerEmail'])->name('app.registerEmail');
Route::post('/application/register-email', [ApplicationController::class, 'storeRegisterEmail'])->name('app.storeRegisterEmail');

// Document upload
Route::get('/application/documents', [DocumentController::class, 'upload'])->name('app.uploadDocuments');
Route::post('/application/documents', [DocumentController::class, 'processUpload'])->name('app.processUpload');
