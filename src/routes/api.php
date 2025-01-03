<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WorkerController;

Route::get('/workers', [WorkerController::class, 'index']); // すべてのWorkerを取得
Route::post('/workers', [WorkerController::class, 'store']); // 新しいWorkerを作成
