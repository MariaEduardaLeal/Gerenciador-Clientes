<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;

Route::resource('clients', ClientController::class);
