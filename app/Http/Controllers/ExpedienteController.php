<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Expediente; // Importa el modelo Expediente

class ExpedienteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // Protege el controlador, requiere autenticación
    }

    /**
     * Muestra el formulario para registrar un nuevo expediente.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('expedientes'); // La vista es expedientes.blade.php
    }

    /**
     * Almacena un nuevo expediente en la base de datos.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        // 1. Validar los datos del formulario
        $validatedData = $request->validate([
            'juzgado' => 'required|string|max:255',
            'numero_expediente' => 'required|string|max:255|unique:expedientes', // Asegura que sea único en la tabla 'expedientes'
            'juicio' => 'required|string|max:255',
            'promovente' => 'required|string|max:255',
            'demandado' => 'required|string|max:255',
            'fecha_inicio' => 'required|date',
            'estado_actual' => 'required|in:en_tramite,archivado,finalizado,pausado',
            'observaciones' => 'nullable|string',
        ]);

        try {
            // 2. Crear y guardar el nuevo expediente en la base de datos
            Expediente::create([
                'user_id' => Auth::id(), // Asigna el ID del usuario autenticado
                'juzgado' => $validatedData['juzgado'],
                'numero_expediente' => $validatedData['numero_expediente'],
                'juicio' => $validatedData['juicio'],
                'promovente' => $validatedData['promovente'],
                'demandado' => $validatedData['demandado'],
                'fecha_inicio' => $validatedData['fecha_inicio'],
                'estado_actual' => $validatedData['estado_actual'],
                'observaciones' => $validatedData['observaciones'],
            ]);

            // 3. Redirigir con un mensaje de éxito
            return redirect()->route('expedientes.create')->with('success', '¡Expediente registrado exitosamente!');

        } catch (\Exception $e) {
            // Manejar cualquier error que ocurra durante el guardado
            return redirect()->back()->withInput()->withErrors(['error' => 'Hubo un problema al registrar el expediente: ' . $e->getMessage()]);
        }
    }

    public function updateFromModal(Request $request, Expediente $expediente)
    {
        // Debugging: Log the incoming request data
        // \Log::info('Incoming updateFromModal request:', $request->all());
        // \Log::info('Expediente ID:', ['id' => $expediente->id, 'user_id' => $expediente->user_id]);
        // \Log::info('Authenticated user ID:', ['auth_id' => Auth::id()]);


        // Asegurarse de que el usuario autenticado es el propietario del expediente
        if (Auth::id() !== $expediente->user_id) {
            // \Log::warning('Unauthorized attempt to update expediente.', ['expediente_id' => $expediente->id, 'user_id' => Auth::id()]);
            return response()->json(['success' => false, 'message' => 'No tienes permiso para editar este expediente.'], 403);
        }

        try {
            // 1. Validar los datos del formulario (similares a 'store' pero sin 'unique' para el propio expediente)
            $validatedData = $request->validate([
                'juzgado' => 'required|string|max:255',
                // El numero_expediente debe ser único excepto para el expediente que se está editando
                'numero_expediente' => 'required|string|max:255|unique:expedientes,numero_expediente,' . $expediente->id,
                'juicio' => 'required|string|max:255',
                'promovente' => 'required|string|max:255',
                'demandado' => 'required|string|max:255',
                'fecha_inicio' => 'required|date',
                'estado_actual' => 'required|in:en_tramite,archivado,finalizado,pausado',
                'observaciones' => 'nullable|string',
            ]);

            // 2. Actualizar el expediente
            $expediente->update($validatedData);

            // Debugging: Log successful update
            // \Log::info('Expediente updated successfully.', ['expediente_id' => $expediente->id, 'updated_data' => $validatedData]);


            // 3. Devolver una respuesta JSON de éxito
            return response()->json(['success' => true, 'message' => '¡Expediente actualizado exitosamente!', 'updated_data' => $expediente->fresh()->toArray()]);

        } catch (ValidationException $e) {
            // Capturar errores de validación y devolverlos
            // \Log::error('Validation error updating expediente.', ['expediente_id' => $expediente->id, 'errors' => $e->errors()]);
            return response()->json(['success' => false, 'errors' => $e->errors()], 422);
        } catch (\Exception $e) {
            // Manejar cualquier otro error y devolver un mensaje genérico
            // \Log::critical('General error updating expediente.', ['expediente_id' => $expediente->id, 'message' => $e->getMessage(), 'trace' => $e->getTraceAsString()]);
            return response()->json(['success' => false, 'message' => 'Hubo un problema al actualizar el expediente: ' . $e->getMessage()], 500);
        }
    }
}

