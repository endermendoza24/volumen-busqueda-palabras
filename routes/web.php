<?php

use App\Http\Controllers\KeywordVolumeController;

Route::get('/', [KeywordVolumeController::class, 'index']);
