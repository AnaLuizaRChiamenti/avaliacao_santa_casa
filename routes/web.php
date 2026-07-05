<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ModuleController;

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
    Route::resource('permissions', PermissionController::class);
    Route::resource('users', UserController::class);
    Route::get('/setores-hospitalares', [ModuleController::class, 'setoresHospitalares'])
    ->name('modules.setores-hospitalares');
    Route::get('/especialidades-medicas', [ModuleController::class, 'especialidadesMedicas'])
        ->name('modules.especialidades-medicas');
    Route::get('/equipamentos', [ModuleController::class, 'equipamentos'])
        ->name('modules.equipamentos');
    Route::get('/unidades-assistenciais', [ModuleController::class, 'unidadesAssistenciais'])
        ->name('modules.unidades-assistenciais');
});

require __DIR__.'/auth.php';
