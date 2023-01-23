<?php

use App\Models\Chat;
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


Route::middleware('api')->post('/chat/{id}/send-message', function (Request $request, Chat $chat) {
    return $chat;
});


Route::middleware('api')->post('/whatsapp-message-user-message', [\App\Http\Controllers\WhatsAppController::class, 'receiveMessage']);
