<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente; // Importa el modelo Expediente

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protege el controlador, requiere autenticación
    }

    /**
     * Muestra el dashboard del usuario con sus expedientes recientes.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Si el usuario no está autenticado por alguna razón (aunque el middleware 'auth' debería evitar esto),
        // o si no tiene expedientes, aseguramos que $expedientesRecientes sea una colección vacía.
        $expedientesRecientes = collect(); 

        if ($user) {
            // Obtener los expedientes del usuario autenticado, ordenados por fecha de creación descendente
            // y limitar a, por ejemplo, 5 expedientes recientes para el dashboard.
            $expedientesRecientes = $user->expedientes()->latest()->take(5)->get();
        }
        
        return view('usuario', compact('user', 'expedientesRecientes'));
    }
}
