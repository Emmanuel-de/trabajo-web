<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage'); // Esto cargará resources/views/homepage.blade.php
});

Route::get('/registro', function () {
    return view('registro');
})->name('registro.form'); // Dale un nombre para facilitar la referencia
