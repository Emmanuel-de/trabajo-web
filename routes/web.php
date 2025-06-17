<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController; // Asegúrate de que este controlador exista y tenga los métodos 'show' y 'update'

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

// Ruta para la página principal. Redirige a dashboard si está autenticado,
// de lo contrario muestra la página de inicio/login.
Route::get('/', function () {
    if (auth()->check()) {
        return redirect()->route('usuario'); // Redirige a la ruta con nombre 'usuario'
    }
    return view('homepage'); // Muestra la vista 'homepage' que probablemente es tu formulario de login
})->name('homepage'); // Cambiado a 'homepage' para consistencia con redirección de logout

// Ruta alternativa para mostrar el formulario de login explícitamente.
// También redirige si el usuario ya está autenticado.
Route::get('/login', function () {
    if (auth()->check()) {
        return redirect()->route('usuario');
    }
    return view('homepage'); // Muestra la misma vista que la raíz para login
})->name('login.form');

// Ruta para procesar el login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Ruta para logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rutas para el registro
Route::get('/registro', [RegisterController::class, 'showRegistrationForm'])->name('registro');
Route::post('/registro', [RegisterController::class, 'register'])->name('registro.store');

// Rutas protegidas (requieren autenticación)
Route::middleware(['auth'])->group(function () {
    // Página principal del usuario autenticado (Dashboard)
    Route::get('/usuario', function () {
        return view('usuario');
    })->name('usuario');
    
    // Otras rutas del sistema judicial que requieren autenticación
    Route::get('/promociones', function () {
        return view('promociones');
    })->name('promociones');
    
    Route::get('/expedientes', function () {
        return view('expedientes');
    })->name('expedientes');

    // Rutas para el perfil de usuario usando ProfileController
    // Se elimina la ruta de closure duplicada y se usa el controlador
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil'); // Para mostrar el perfil
    Route::put('/perfil', [ProfileController::class, 'update'])->name('perfil.update'); // Para actualizar el perfil (requiere PUT/PATCH)

    // Ruta para la página de ayuda
    Route::get('/ayuda', function () {
        // Pasa el usuario si la vista de ayuda lo necesita
        $user = Auth::user(); 
        return view('ayuda', compact('user'));
    })->name('ayuda'); 

    // Aquí puedes añadir cualquier otra ruta que solo deba ser accesible por usuarios autenticados
});
