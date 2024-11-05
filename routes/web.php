<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\HeartBeatController;

Route::get('/', function () {
    return view('interface');
});

Route::post('/api/heartbeat', [HeartBeatController::class, 'store'])->name('heartbeat.store');