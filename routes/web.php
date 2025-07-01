<?php

use App\Http\Controllers\HorarioController;
use App\Http\Controllers\MateriaController;

Route::resource('materias', MateriaController::class);

Route::resource('horarios', HorarioController::class);
