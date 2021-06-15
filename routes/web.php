<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Http\Controllers\QualificationController;

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
    return view('index');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function()
{

    // Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/index', [QualificationController::class, 'index'])->name('index');

    Route::post('/save_qualification', [QualificationController::class, 'save'])->name('save.qualification');

    Route::get('/delete_qualification/{id}', [QualificationController::class, 'delete'])->name('delete.qualification');

    Route::get('/edit_page/{id}', [QualificationController::class, 'editPage'])->name('edit.page');

    Route::post('/edit_qualification', [QualificationController::class, 'edit'])->name('edit.qualification');


});