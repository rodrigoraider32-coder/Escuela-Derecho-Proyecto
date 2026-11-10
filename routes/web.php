<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ControllerUsuarios;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\CalificacionController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\MaestroController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PaymentController;
#use App\Http\Controllers\MateriaController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/usuarios', [ControllerUsuarios::class, 'index'])->name('usuarios.index');

    Route::get('/alumnos', [AlumnoController::class, 'index'])->name('alumno.index');
    Route::get('/alumnos/create', [AlumnoController::class, 'create'])->name('alumnos.create');
    Route::post('/alumnos', [AlumnoController::class, 'store'])->name('alumnos.store');
    Route::get('/alumnos/{id}/edit', [AlumnoController::class, 'edit'])->name('alumnos.edit');
    Route::put('/alumnos/{id}', [AlumnoController::class, 'update'])->name('alumnos.update');
    Route::delete('/alumnos/{id}', [AlumnoController::class, 'destroy'])->name('alumnos.destroy');
    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.index');

    Route::get('/tickets/create', [TicketController::class, 'create'])->name('tickets.create');
    Route::get('/tickets', [TicketController::class, 'index'])->name('tickets.index');
    Route::post('/tickets', [TicketController::class, 'store'])->name('tickets.store');    
    Route::patch('/tickets/{ticket}/status', [TicketController::class, 'updateStatus'])->name('tickets.updateStatus');
    Route::get('/tickets/{ticket}', [TicketController::class, 'show'])->name('tickets.show');
    Route::post('/tickets/{ticket}/responses', [TicketController::class, 'storeResponse'])->name('tickets.storeResponse');

    Route::get('/maestros/capturar', [MaestroController::class, 'capturar'])->name('maestros.capturar');
    Route::post('/maestros/guardar', [MaestroController::class, 'store'])->name('maestros.store');
    Route::get('/alumno/calificaciones', [AlumnoController::class, 'misCalificaciones'])->name('alumno.calificaciones');
    Route::get('/alumno/promedio', [AlumnoController::class, 'promedio'])->name('alumno.promedio');

    Route::get('/admin/calificaciones', [AdminController::class, 'revisionCalificaciones'])->name('admin.revision');
    Route::patch('/admin/calificaciones/{id}/aprobar', [AdminController::class, 'aprobarCalificacion'])->name('admin.calificaciones.aprobar');
    Route::patch('/admin/calificaciones/{id}/rechazar', [AdminController::class, 'rechazarCalificacion'])->name('admin.calificaciones.rechazar');

    #Route::resource('materias', MateriaController::class)->names([
    #    'index' => 'alumno.materias',
    #]);

    Route::get('/pagos', function () {
        return view('pagos.index');
    })->name('pagos.index');
    Route::get('/pagos/exito', [PaymentController::class, 'success'])->name('payments.success');
    Route::get('/pagos/cancelado', [PaymentController::class, 'cancel'])->name('payments.cancel');
});
