<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\Promocion;
use App\Models\Expediente;

class PromocionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $expedientes = Auth::user()->expedientes;
        return view('promociones', compact('expedientes'));
    }

    public function create()
    {
        $expedientes = Auth::user()->expedientes;
        return view('promociones', compact('expedientes'));
    }

    public function store(Request $request)
    {
        $action = $request->input('action');

        switch ($action) {
            case 'generar_promocion':
                return $this->generarPromocion($request);
            case 'subir_anexo':
                return $this->subirAnexo($request);
            case 'firmar_enviar':
                return $this->firmarEnviar($request);
            default:
                return redirect()->back()->with('error', 'Acción no válida');
        }
    }

    private function generarPromocion(Request $request)
    {
        $request->validate([
            'expediente_id' => 'required|exists:expedientes,id',
            'nombre_promocion' => 'required|string|max:255',
            'redactar_promocion' => 'required|string|min:10',
        ], [
            'expediente_id.required' => 'Debe seleccionar un expediente',
            'expediente_id.exists' => 'El expediente seleccionado no existe',
            'nombre_promocion.required' => 'El nombre de la promoción es requerido',
            'redactar_promocion.required' => 'El contenido de la promoción es requerido',
            'redactar_promocion.min' => 'El contenido debe tener al menos 10 caracteres',
        ]);

        try {
            $promocion = Promocion::create([
                'user_id' => Auth::id(),
                'expediente_id' => $request->expediente_id,
                'nombre_promocion' => $request->nombre_promocion,
                'contenido_promocion' => $request->redactar_promocion,
                'tipo_accion' => 'generar_promocion',
                'estado' => 'generada',
                'fecha_generacion' => now(),
            ]);

            return redirect()->back()
                ->with('success', 'Promoción generada exitosamente. ID: ' . $promocion->id . '. Ahora puede proceder a firmar y enviar.')
                ->with('promocion_generada_id', $promocion->id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al generar la promoción: ' . $e->getMessage());
        }
    }

    private function subirAnexo(Request $request)
    {
        $request->validate([
            'expediente_id' => 'required|exists:expedientes,id',
            'anexo_file' => 'required|file|mimes:pdf,doc,docx,jpg,jpeg,png|max:10240',
            'promocion_id' => 'nullable|exists:promociones,id',
        ], [
            'expediente_id.required' => 'Debe seleccionar un expediente',
            'anexo_file.required' => 'Debe seleccionar un archivo',
            'anexo_file.mimes' => 'El archivo debe ser PDF, DOC, DOCX, JPG, JPEG o PNG',
            'anexo_file.max' => 'El archivo no puede ser mayor a 10MB',
        ]);

        try {
            $file = $request->file('anexo_file');
            $originalName = $file->getClientOriginalName();
            $fileName = time() . '_' . $originalName;
            
            $path = $file->storeAs('anexos', $fileName, 'public');
            
            // If there's an existing promotion ID, attach the file to it
            if ($request->promocion_id) {
                $promocion = Promocion::find($request->promocion_id);
                if ($promocion && $promocion->user_id == Auth::id()) {
                    // Update existing promotion with the file
                    $promocion->update([
                        'archivo_anexo' => $path,
                        'observaciones' => ($promocion->observaciones ? $promocion->observaciones . '; ' : '') . 'Archivo anexo agregado: ' . $originalName,
                    ]);
                    return redirect()->back()->with('success', 'Archivo anexo agregado a la promoción #' . $promocion->id . ' exitosamente.');
                }
            }
            
            // Create new promotion if no existing one specified
            $promocion = Promocion::create([
                'user_id' => Auth::id(),
                'expediente_id' => $request->expediente_id,
                'nombre_promocion' => 'Anexo - ' . $originalName,
                'contenido_promocion' => 'Archivo anexo subido: ' . $originalName,
                'tipo_accion' => 'subir_anexo',
                'estado' => 'generada',
                'archivo_anexo' => $path,
                'fecha_generacion' => now(),
            ]);
            
            return redirect()->back()->with('success', 'Archivo anexo subido exitosamente. ID Promoción: ' . $promocion->id);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al subir el archivo: ' . $e->getMessage());
        }
    }

    private function firmarEnviar(Request $request)
    {
        $request->validate([
            'expediente_id' => 'required|exists:expedientes,id',
            'nombre_promocion' => 'required|string|max:255',
            'redactar_promocion' => 'required|string|min:10',
            'certificado' => 'required|string',
        ], [
            'expediente_id.required' => 'Debe seleccionar un expediente',
            'nombre_promocion.required' => 'El nombre de la promoción es requerido',
            'redactar_promocion.required' => 'El contenido de la promoción es requerido',
            'certificado.required' => 'Debe seleccionar un certificado para firmar',
        ]);

        try {
            $promocion = Promocion::create([
                'user_id' => Auth::id(),
                'expediente_id' => $request->expediente_id,
                'nombre_promocion' => $request->nombre_promocion,
                'contenido_promocion' => $request->redactar_promocion,
                'tipo_accion' => 'firmar_enviar',
                'estado' => 'enviada',
                'certificado_firma' => $request->certificado,
                'fecha_generacion' => now(),
                'fecha_firma' => now(),
                'fecha_envio' => now(),
            ]);
            
            return redirect()->back()->with('success', 'Promoción firmada y enviada exitosamente. ID: ' . $promocion->id . '. Se ha registrado en el sistema.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al firmar y enviar la promoción: ' . $e->getMessage());
        }
    }
}


