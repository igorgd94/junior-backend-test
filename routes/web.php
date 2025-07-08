<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CreateContactController;
use Illuminate\Support\Facades\Route;

Route::resource('contacts', CreateContactController::class);
Route::resource('contacts-inertia', ContactController::class);
