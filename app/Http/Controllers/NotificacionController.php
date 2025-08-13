<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notificacion;

class NotificacionController extends Controller
{
    /**
     * Muestra la vista principal con el formulario y la tabla.
     * Debe coincidir con resources/views/notificaciones.blade.php
     */
    public function index()
    {
        // Obtén las notificaciones más recientes primero
        $notificaciones = Notificacion::orderBy('fecha', 'desc')
            ->orderBy('id', 'desc')
            ->get();

        return view('notificaciones', compact('notificaciones'));
    }

    /**
     * Guarda una nueva notificación desde el formulario.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tipo_asunto' => 'required|string|in:Legal,Administrativo,Informativo,Financiero',
            'estado'      => 'required|string|in:Pendiente,Leido',
            'fecha'       => 'required|date',
            'expediente'  => 'required|string|max:64',
            'descripcion' => 'nullable|string|max:2000',
        ]);

        try {
            Notificacion::create($validated);
            return redirect()
                ->route('notificaciones.index')
                ->with('success', 'Notificación creada correctamente.');
        } catch (\Throwable $e) {
            // Log::error($e->getMessage()); // opcional
            return back()
                ->withInput()
                ->with('error', 'Ocurrió un error al crear la notificación.');
        }
    }

    /**
     * (Opcional) Marcar como leído.
     * Úsalo si habilitas la ruta PATCH notificaciones/{id}/leer
     */
    public function markAsRead($id)
    {
        $notificacion = Notificacion::findOrFail($id);
        $notificacion->estado = 'Leido';
        $notificacion->save();

        return back()->with('success', 'La notificación se marcó como leída.');
    }
}
