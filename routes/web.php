<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Elimina la línea de TodoController de aquí ya que va en api.php