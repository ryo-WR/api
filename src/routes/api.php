<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkerController;

Route::get('/workers', [WorkerController::class, 'index']); // すべてのWorkerを取得
Route::post('/workers', [WorkerController::class, 'store']); // 新しいWorkerを作成

Route::get('/user', function (Request $requesut) {
  return $requesut->workers();
})->middleware('auth:sanctum');

Route::get('/sample', function (Request $request) {
  return response()->json([
      'message' => 'Hello, API!'
  ]);
});