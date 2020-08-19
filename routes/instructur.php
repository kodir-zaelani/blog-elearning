<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return ('This instructur route');
})->name('instructur')->middleware('auth', 'role:instructur');