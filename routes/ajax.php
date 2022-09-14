<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;

/*
|--------------------------------------------------------------------------
| Ajax Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(['middleware' => 'auth:web'], function () {
Route::get('/Get_classrooms/{id}', [AjaxController::class,'getClassrooms']);
Route::get('/Get_Sections/{id}', [AjaxController::class,'Get_Sections']);
});

