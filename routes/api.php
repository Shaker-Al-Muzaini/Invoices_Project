<?php

use App\Http\Controllers\IncoiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('get_all_invoice',[IncoiceController::class,'get_all_invoices']);
Route::get('search_invoice',[IncoiceController::class,'search_invoices']);
Route::get('create_invoice',[IncoiceController::class,'create_invoice']);
