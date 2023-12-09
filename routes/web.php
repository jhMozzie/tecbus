<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


// First group for user
Route::middleware(['auth', 'verified', 'checkusertype:Estudiante'])->group(function () {
    Route::get('/estudiante', EstudianteComponent::class)->name('estudiante.dashboard');
});


// Second group for user
Route::middleware(['auth', 'verified', 'checkusertype:Profesor'])->group(function () {
    Route::get('/profesor', ProfesorComponent::class)->name('profesor.dashboard');
});

// Third group for user
Route::middleware(['auth', 'verified', 'checkusertype:Administrador'])->group(function () {
    Route::get('/administrador', AdminComponent::class)->name('admin.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
