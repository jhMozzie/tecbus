<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\EstudianteController;
use App\Http\Controllers\ProfesorController;
use App\Http\Controllers\ProfileController;
use App\Livewire\AdminComponent;
use App\Livewire\EstudianteComponent;
use App\Livewire\ProfesorComponent;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


// First group for user
// Route::middleware(['checkusertype:Estudiante'])->group(function () {
//     Route::get('/estudiante', EstudianteComponent::class)->name('estudiante.dashboard');
// });


// Second group for user
// Route::middleware(['checkusertype:Profesor'])->group(function () {
//     Route::get('/profesor', ProfesorComponent::class)->name('profesor.dashboard');
// });

// Third group for user
// Route::middleware(['checkusertype:Administrador'])->group(function () {
//     Route::get('/administrador', AdminComponent::class)->name('admin.dashboard');
// });


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::middleware(['type:Administrador'])->group(function () {
        Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
        Route::view('/admin/bus', 'admin.bus')->name("/admin/bus");
    });

    Route::middleware(['type:Estudiante'])->group(function () {
        Route::get('/estudiante/dashboard', [EstudianteController::class, 'EstudianteDashboard'])->name('estudiante.dashboard');
    });

    Route::middleware(['type:Profesor'])->group(function () {
        Route::get('/profesor/dashboard', [ProfesorController::class, 'ProfesorDashboard'])->name('profesor.dashboard');
    });
});






// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// Route::get('/estudiante/dashboard', [EstudianteController::class, 'EstudianteDashboard'])->name('estudiante.dashboard');
// Route::get('/profesor/dashboard', [ProfesorController::class, 'ProfesorDashboard'])->name('profesor.dashboard');

require __DIR__ . '/auth.php';
