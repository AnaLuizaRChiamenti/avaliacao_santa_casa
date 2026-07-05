<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('users', UserController::class)
        ->middleware('role:admin');

    Route::resource('permissions', PermissionController::class)
        ->middleware('role:admin');

    Route::get('/setores-hospitalares', [ModuleController::class, 'setoresHospitalares'])
        ->middleware(['role:colaborador', 'permission:setores-hospitalares'])
        ->name('modules.setores-hospitalares');

    Route::get('/especialidades-medicas', [ModuleController::class, 'especialidadesMedicas'])
        ->middleware(['role:colaborador', 'permission:especialidades-medicas'])
        ->name('modules.especialidades-medicas');

    Route::get('/equipamentos', [ModuleController::class, 'equipamentos'])
        ->middleware(['role:colaborador', 'permission:equipamentos'])
        ->name('modules.equipamentos');

    Route::get('/unidades-assistenciais', [ModuleController::class, 'unidadesAssistenciais'])
        ->middleware(['role:colaborador', 'permission:unidades-assistenciais'])
        ->name('modules.unidades-assistenciais');
});

require __DIR__.'/auth.php';
