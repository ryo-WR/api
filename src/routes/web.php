<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\WorkerWebController;

Route::get('/', function () {
  return view('welcome');
});

Route::name('web.')->group(function () {
  Route::get('/workers', [WorkerWebController::class, 'index'])->name('workers.index');
  Route::post('/workers', [WorkerWebController::class, 'store'])->name('workers.store');
  Route::get('/workers/{id}', [WorkerWebController::class, 'show'])->name('workers.show');
  Route::put('/workers/{id}', [WorkerWebController::class, 'update'])->name('workers.update');
  // Route::get('/workers/{id}/edit', [WorkerWebController::class, 'edit'])->name('workers.edit');
  Route::delete('/workers/{id}', [WorkerWebController::class, 'destroy'])->name('workers.destroy');

});