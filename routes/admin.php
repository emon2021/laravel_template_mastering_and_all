<?php

use Illuminate\Support\Facades\Route;


Route::get('/admin', function () {
    return ('<h1>This is Admin Route!');
});