<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NuxtController;

Route::get('{any}', NuxtController::class)->where('any', '.*');
