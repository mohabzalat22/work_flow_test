<?php

use Illuminate\Support\Facades\Route;
use Modules\Workflows\Http\Controllers\WorkflowsController;
use Modules\Workflows\Http\Controllers\StartController;
use Modules\Workflows\Http\Controllers\UploadController;




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

Route::group([], function () {
    Route::resource('workflows', WorkflowsController::class)->names('workflows');
    Route::get('/start',[StartController::class , 'index'])->name('start');
    Route::get('/notifications',[StartController::class , 'notification'])->name('notification');
    Route::post('/upload',[UploadController::class , 'store'])->name('upload');
    Route::get('/decline/{order}',[StartController::class , 'decline'])->name('decline');

})->middleware('auth');
