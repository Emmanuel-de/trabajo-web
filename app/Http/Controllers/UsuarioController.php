<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente; // Asegúrate de que el modelo Expediente esté importado

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protege el controlador, requiere autenticación
    }

    /**
     * Muestra el dashboard del usuario con sus expedientes recientes y el conteo total.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Inicializa las variables para evitar errores si el usuario no tiene expedientes o no está autenticado.
        $expedientesRecientes = collect(); 
        $totalExpedientesCount = 0; // Inicializa el contador a 0

        if ($user) {
            // Obtener los 5 expedientes más recientes del usuario autenticado para la tabla del dashboard.
            $expedientesRecientes = $user->expedientes()->latest()->take(5)->get();
            // Conteo total de expedientes del usuario autenticado.
            $totalExpedientesCount = $user->expedientes()->count();
        }
        
        // Pasa todas las variables necesarias a la vista en una única sentencia return.
        return view('usuario', compact('user', 'expedientesRecientes', 'totalExpedientesCount'));
    }
}
