<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\WorkerController;

Route::get('/', [WorkerController::class, 'index'])->name('workers.index');
Route::post('/workers', [WorkerController::class, 'store'])->name('workers.store');
