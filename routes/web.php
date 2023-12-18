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
        Route::view('/admin/bus', 'admin.bus')->name("/admin/bus");
        Route::view('/admin/driver', 'admin.driver')->name("/admin/driver");
        Route::view('/admin/route', 'admin.route')->name("/admin/route");
        Route::view('/admin/busstop', 'admin.busstop')->name("/admin/busstop");
        Route::view('/admin/trip', 'admin.trip')->name("/admin/trip");
        Route::view('/admin/user', 'admin.user')->name("/admin/user");
        Route::view('/admin/boarding', 'admin.boarding')->name("/admin/boarding");
        Route::view('/admin/user_type', 'admin.user_type')->name("/admin/user_type");
        Route::view('/Administrador/dashboard', 'admin.admin_dashboard')->name("Administrador.dashboard");
    });

    Route::middleware(['type:Estudiante'])->group(function () {
        Route::view('/Estudiante/dashboard', 'estudiante.estudiante_dashboard')->name("Estudiante.dashboard");
        Route::view('/estudiante/trip', 'estudiante.trip')->name("/estudiante/trip");
    });

    Route::middleware(['type:Profesor'])->group(function () {
        Route::view('/Profesor/dashboard', 'profesor.profesor_dashboard')->name("Profesor.dashboard");
        Route::view('/profesor/trip', 'profesor.trip')->name("/profesor/trip");
    });
 
    Route::middleware(['type:Chofer'])->group(function () {
        Route::view('/Chofer/dashboard', 'chofer.chofer_dashboard')->name("Chofer.dashboard");
    });
});


// ['name' => 'Estudiante'],
// ['name' => 'Profesor'],
// ['name' => 'Administrador'],
// ['name' => 'Chofer'],



// Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
// Route::get('/estudiante/dashboard', [EstudianteController::class, 'EstudianteDashboard'])->name('estudiante.dashboard');
// Route::get('/profesor/dashboard', [ProfesorController::class, 'ProfesorDashboard'])->name('profesor.dashboard');

require __DIR__ . '/auth.php';
