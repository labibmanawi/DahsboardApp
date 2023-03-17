<?php

use App\Http\Controllers\Api\OrderItemController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


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

Route::prefix('orders')->group(function () {

    Route:: get('/order_item/{id}',[OrderItemController::class, 'index']);
    Route:: post('/order_item/{id}',[OrderItemController::class, 'store']);
    Route:: put('/order_item/{id}',[OrderItemController::class, 'update']);
    Route:: delete('{order_id}/order_item/{id}',[OrderItemController::class, 'destroy']);
    // Route:: post('/order_item/{id}',[AdminLTEController::class, 'insertOrder_ItemAction']);
    // Route:: get('/editOrder/{id}',[AdminLTEController::class, 'edit_orderItem']);
    // Route:: post('/editOrder-post/{id}',[AdminLTEController::class, 'editOrder_itemAction']);
    // Route:: get('/delete/{id}', [AdminLTEController::class,'delete_oi']);
     
});



