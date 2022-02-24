<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/ajax-search-homemenbox',[ApiController::class,'ajaxSearch'])->name('ajax-search-homemenbox');
Route::get('/ajax-search-popularbox',[ApiController::class,'ajaxSearch'])->name('ajax-search-popularbox');
Route::get('/ajax-search-name',[ApiController::class,'ajaxSearch'])->name('ajax-search-name');
Route::get('/api/ajax-search-quickview',[ApiController::class,'ajaxSearchProduct'])->name('api-ajax-search-quickview');