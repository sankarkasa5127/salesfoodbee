<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\MainController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/save_order',[MainController::class,'save_order']); 
Route::post('/save_category',[MainController::class,'save_category']);
Route::post('/save_group',[MainController::class,'save_group']);
Route::post('/save_item',[MainController::class,'save_item']);
