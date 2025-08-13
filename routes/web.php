<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AyudaController;
use App\Http\Controllers\PromocionController;
use App\Http\Controllers\CustomPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\ExpedienteController;
use App\Http\Controllers\UsuarioController; // ¡Importa el UsuarioController!
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\NotificacionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puedes registrar rutas web para tu aplicación. Estas
| rutas son cargadas por el RouteServiceProvider dentro de un grupo
| que contiene el grupo de middleware "web". ¡Ahora construye algo genial!
|
*/

// Rutas de autenticación y acceso público (sin requerir login)
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('usuario');
    }
    return view('homepage');
})->name('homepage');

Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('usuario');
    }
    return view('homepage');
})->name('login.form');

Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas para el registro
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.store');

// Rutas para restablecimiento de contraseña
Route::get('password/reset', [CustomPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// RUTA DE AYUDA: Ahora es accesible públicamente
Route::get('/ayuda', function() {
    return view('homeayuda');
})->name('homeayuda');


// RUTA DE BUZÓN: Se mantiene accesible públicamente.
Route::get('/buzon', function() {
    return view('buzon');
})->name('buzon');


// RUTA DE SOPORTE: Accesible públicamente para la página de soporte.
Route::get('/soporte', function() {
    return view('soporte');
})->name('soporte');

 Route::resource('expedientes', ExpedienteController::class);
// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Página principal del usuario autenticado (Dashboard)
    // CAMBIO APLICADO AQUÍ: La ruta 'usuario' ahora apunta al UsuarioController
    Route::get('/usuario', [UsuarioController::class, 'index'])->name('usuario');

    // Rutas de Promociones
    // Ruta para mostrar la lista general de promociones (o la vista "promociones.blade.php")
    Route::get('/promociones', [PromocionController::class, 'index'])->name('promociones.index');

    // Ruta para mostrar el formulario de crear nueva promoción
    Route::get('/promociones/nueva', [PromocionController::class, 'create'])->name('promociones.create');
    // Ruta POST para almacenar la nueva promoción
    Route::post('/promociones', [PromocionController::class, 'store'])->name('promociones.store');

    // Rutas de Expedientes (¡Esta es la clave para el error que tenías!)
    // Ruta para mostrar la lista de expedientes
    Route::get('/expedientes', [ExpedienteController::class, 'index'])->name('expedientes.index');
    // Ruta para actualizar un expediente desde el modal (usada en usuario.blade.php)
    Route::put('/expedientes/{expediente}/update-modal', [ExpedienteController::class, 'updateFromModal'])->name('expedientes.updateFromModal');
    // NUEVA RUTA PARA ACTUALIZAR EXPEDIENTES DESDE EL MODAL (usando PUT para RESTful update)

    Route::post('/expedientes/{expediente}/update-modal', [ExpedienteController::class, 'updateFromModal'])->name('expedientes.updateFromModal');

     // ===== RUTAS DE REPORTES =====
    // Ruta para mostrar la vista principal de reportes (generador y visor)
    Route::get('/reportes', [ReporteController::class, 'index'])->name('reportes.index');

    // Ruta para crear un nuevo reporte (POST)
    Route::post('/reportes', [ReporteController::class, 'store'])->name('reportes.store');

    // Ruta para mostrar un reporte específico
    Route::get('/reportes/{reporte}', [ReporteController::class, 'show'])->name('reportes.show');

    // Ruta para editar un reporte
    Route::get('/reportes/{reporte}/editar', [ReporteController::class, 'edit'])->name('reportes.edit');
    Route::put('/reportes/{reporte}', [ReporteController::class, 'update'])->name('reportes.update');

    // Ruta para eliminar un reporte
    Route::delete('/reportes/{reporte}', [ReporteController::class, 'destroy'])->name('reportes.destroy');

    // Ruta para exportar reportes (opcional - PDF, Excel, etc.)
    Route::get('/reportes/{reporte}/exportar', [ReporteController::class, 'export'])->name('reportes.export');

    // Ruta para generar reportes automáticos por tipo
    Route::post('/reportes/generar/{tipo}', [ReporteController::class, 'generateByType'])->name('reportes.generateByType');

    // Rutas para el perfil de usuario usando ProfileController
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil');
    Route::put('/perfil', [ProfileController::class, 'update'])->name('perfil.update');

    // Aquí puedes añadir cualquier otra ruta que solo deba ser accesible por usuarios autenticados

    // Vista principal: muestra la tabla y el formulario (debe pasar $notificaciones a la vista)
    Route::get('/notificaciones', [NotificacionController::class, 'index'])
        ->name('notificaciones.index');

    // Crear nueva notificación (coincide con action="{{ route('notificaciones.store') }}" del form)
    Route::post('/notificaciones', [NotificacionController::class, 'store'])
        ->name('notificaciones.store');

        Route::patch('/notificaciones/{id}/leer', [NotificacionController::class, 'markAsRead'])
    ->name('notificaciones.markAsRead');

});

// Rutas para reportes
Route::middleware('auth')->group(function () {
    Route::resource('reportes', ReporteController::class);
    Route::get('reportes/{reporte}/export', [ReporteController::class, 'export'])->name('reportes.export');
    Route::post('reportes/generate/{tipo}', [ReporteController::class, 'generateByType'])->name('reportes.generate');
    Route::get('reportes-trash', [ReporteController::class, 'trash'])->name('reportes.trash');
    Route::post('reportes/{id}/restore', [ReporteController::class, 'restore'])->name('reportes.restore');
    Route::delete('reportes/{id}/force-delete', [ReporteController::class, 'forceDelete'])->name('reportes.forceDelete');
});