<?php

use App\Http\Controllers\API\WorkerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $requesut) {
  return $requesut->workers();
})->middleware('auth:sanctum');


Route::prefix('v1')->name('api.')->group(function () {
  Route::apiResources([
    'worker' => App\Http\Controllers\API\WorkerController::class,
  ]);
});

Route::prefix('v1')->name('api.')->group(function () {
  Route::get('worker', [WorkerController::class, 'edit'])->name('worker.edit');
});
