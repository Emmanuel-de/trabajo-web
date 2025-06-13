<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('homepage'); // Esto cargará resources/views/homepage.blade.php
});
