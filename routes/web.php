<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\ProyectoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\ProgramaController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::resource('programas', ProgramaController::class);

Route::get('/search', [SearchController::class, 'search'])->name('search');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RolController::class);
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('proyectos', ProyectoController::class);
    Route::resource('programas', ProgramaController::class);

    Route::get('programas/{id}/proyectos-asociados', [ProgramaController::class, 'proyectosAsociados'])->name('programas.proyectosAsociados');
    Route::get('proyectos/financiados', [ProyectoController::class, 'financiados'])->name('proyectos.financiados');
    Route::get('proyectos/semilleros', [ProyectoController::class, 'semilleros'])->name('proyectos.semilleros');
    Route::get('proyectos/financiados/search', [ProyectoController::class, 'searchFinanciados'])->name('proyectos.searchFinanciados');
    Route::get('proyectos/{id}', [ProyectoController::class, 'show'])->name('proyectos.show');
});

Route::get('export-proyectos', [ProyectoController::class, 'export'])->name('export.proyectos');
