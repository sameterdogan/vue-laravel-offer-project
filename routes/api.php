<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ProjectController;
use App\Http\Controllers\API\OfferController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function (){
    Route::controller(ProjectController::class)->group(function (){
        Route::post('create-project','store');
        Route::get('list-project','index');
        Route::get('details-project/{id}','show');
    });

    Route::controller(OfferController::class)->group(function (){
        Route::post('create-offer','createOffer');
        Route::get('offers','getOffers');
    });
});


Route::controller(AuthController::class)->group(function (){
    Route::post('login','login');
    Route::post('register','register');
});
