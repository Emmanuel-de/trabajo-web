<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente;
use App\Models\Promocion;

class UsuarioController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Muestra el dashboard del usuario con sus expedientes recientes y el conteo total.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $user = Auth::user();

        // Get counts for dashboard
        $promocionesCount = $user->promociones()->count();
        $expedientesCount = $user->expedientes()->count();
        $totalExpedientesCount = $expedientesCount; // Alias for compatibility
        
        // Get recent items
        $promocionesRecientes = $user->promociones()
            ->with('expediente')
            ->latest()
            ->take(5)
            ->get();
            
        $expedientesRecientes = $user->expedientes()
            ->latest()
            ->take(5)
            ->get();

        return view('usuario', compact(
            'user',
            'promocionesCount', 
            'expedientesCount', 
            'totalExpedientesCount',
            'promocionesRecientes',
            'expedientesRecientes'
        ));
    }
}
