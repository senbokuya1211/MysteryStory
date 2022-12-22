<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Auth\ForgotPasswordController;

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
Route::post('password/request', [ForgotPasswordController::class, 'sendResetLinkEmail']); // パスワード再設定メール送信
Route::post('password/reset', [ForgotPasswordController::class, 'resetPassword']); // パスワード再設定
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
