<?php

use App\Http\Controllers\KeywordVolumeController;

Route::get('/', [KeywordVolumeController::class, 'index']);
Route::post('/get-volume', [KeywordVolumeController::class, 'getVolume'])->name('get-volume');
Route::get('/get-suggestions', [KeywordVolumeController::class, 'getSuggestions'])->name('get-suggestions');