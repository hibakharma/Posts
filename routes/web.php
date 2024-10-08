<?php


use App\Http\Controllers\ListingController;
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
Route::get('/listings/create',  [ListingController::class, 'create']);
Route::get('/', [ListingController::class, 'index']);
Route::post('/listings',  [ListingController::class, 'store']);
Route::get('/listings/{id}',  [ListingController::class, 'show']);
