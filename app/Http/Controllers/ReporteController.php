<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;

class ReporteController extends Controller
{
    /**
     * Mostrar la vista principal de reportes (generador y visor)
     */
    public function index()
    {
        // Obtener todos los reportes del usuario actual (excluyendo eliminados), ordenados por fecha de creación
        $reportes = Reporte::where('user_id', Auth::id())
            ->whereNull('deleted_at') // Asegurar que no se muestren reportes eliminados
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('reporte', compact('reportes'));
    }

    /**
     * Almacenar un nuevo reporte en la base de datos
     */
    public function store(Request $request)
    {
        // Validar los datos del formulario
        $validator = Validator::make($request->all(), [
            'report-title' => 'required|string|max:255',
            'report-description' => 'required|string|max:1000',
            'report-date' => 'required|date',
            'report-type' => 'required|string|in:expedientes,promociones,estadisticas,general'
        ], [
            'report-title.required' => 'El título del reporte es obligatorio.',
            'report-title.max' => 'El título no puede exceder 255 caracteres.',
            'report-description.required' => 'La descripción del reporte es obligatoria.',
            'report-description.max' => 'La descripción no puede exceder 1000 caracteres.',
            'report-date.required' => 'La fecha del reporte es obligatoria.',
            'report-date.date' => 'La fecha debe ser válida.',
            'report-type.required' => 'El tipo de reporte es obligatorio.',
            'report-type.in' => 'El tipo de reporte seleccionado no es válido.'
        ]);

        if ($validator->fails()) {
            return back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Por favor, corrige los errores en el formulario.');
        }

        try {
            // Crear el nuevo reporte
            $reporte = Reporte::create([
                'titulo' => $request->input('report-title'),
                'descripcion' => $request->input('report-description'),
                'fecha_reporte' => $request->input('report-date'),
                'tipo' => $request->input('report-type'),
                'user_id' => Auth::id(),
                'estado' => 'activo',
                'contenido_json' => json_encode([
                    'datos_generales' => [
                        'fecha_creacion' => now(),
                        'usuario_creador' => Auth::user()->name,
                        'tipo_reporte' => $request->input('report-type')
                    ]
                ])
            ]);

            return redirect()->route('reportes.index')
                ->with('success', 'Reporte creado exitosamente con ID #' . str_pad($reporte->id, 3, '0', STR_PAD_LEFT));

        } catch (\Exception $e) {
            return back()
                ->withInput()
                ->with('error', 'Error al crear el reporte. Por favor, inténtalo de nuevo.');
        }
    }

    /**
     * Mostrar un reporte específico
     */
    public function show(Reporte $reporte)
    {
        // Verificar que el reporte pertenece al usuario actual
        if ($reporte->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para ver este reporte.');
        }

        return view('reportes.show', compact('reporte'));
    }

    /**
     * Mostrar el formulario para editar un reporte
     */
    public function edit(Reporte $reporte)
    {
        // Verificar que el reporte pertenece al usuario actual
        if ($reporte->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para editar este reporte.');
        }

        return view('reportes.edit', compact('reporte'));
    }

    /**
     * Actualizar un reporte existente
     */
    public function update(Request $request, Reporte $reporte)
    {
        // Verificar que el reporte pertenece al usuario actual
        if ($reporte->user_id !== Auth::id()) {
            if ($request->ajax()) {
                return response()->json(['success' => false, 'message' => 'No tienes permiso para actualizar este reporte.'], 403);
            }
            abort(403, 'No tienes permiso para actualizar este reporte.');
        }

        // Validar los datos
        $validator = Validator::make($request->all(), [
            'titulo' => 'required|string|max:255',
            'descripcion' => 'required|string|max:1000',
            'fecha_reporte' => 'required|date',
            'tipo' => 'required|string|in:expedientes,promociones,estadisticas,general',
            'estado' => 'required|string|in:activo,archivado,finalizado,pausado'
        ], [
            'titulo.required' => 'El título del reporte es obligatorio.',
            'titulo.max' => 'El título no puede exceder 255 caracteres.',
            'descripcion.required' => 'La descripción del reporte es obligatoria.',
            'descripcion.max' => 'La descripción no puede exceder 1000 caracteres.',
            'fecha_reporte.required' => 'La fecha del reporte es obligatoria.',
            'fecha_reporte.date' => 'La fecha debe ser válida.',
            'tipo.required' => 'El tipo de reporte es obligatorio.',
            'tipo.in' => 'El tipo de reporte seleccionado no es válido.',
            'estado.required' => 'El estado del reporte es obligatorio.',
            'estado.in' => 'El estado seleccionado no es válido.'
        ]);

        if ($validator->fails()) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ], 422);
            }
            
            return back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Actualizar el reporte
            $reporte->update([
                'titulo' => $request->titulo,
                'descripcion' => $request->descripcion,
                'fecha_reporte' => $request->fecha_reporte,
                'tipo' => $request->tipo,
                'estado' => $request->estado,
                'updated_at' => now()
            ]);

            if ($request->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => 'Reporte actualizado exitosamente.',
                    'reporte' => $reporte
                ]);
            }

            return redirect()->route('reportes.index')
                ->with('success', 'Reporte actualizado exitosamente.');

        } catch (\Exception $e) {
            if ($request->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al actualizar el reporte.'
                ], 500);
            }
            
            return back()
                ->withInput()
                ->with('error', 'Error al actualizar el reporte.');
        }
    }

    /**
     * Eliminar un reporte (soft delete)
     */
    public function destroy(Reporte $reporte)
    {
        // Verificar que el reporte pertenece al usuario actual
        if ($reporte->user_id !== Auth::id()) {
            if (request()->ajax()) {
                return response()->json(['error' => 'No tienes permiso para eliminar este reporte.'], 403);
            }
            return redirect()->route('reportes.index')
                ->with('error', 'No tienes permiso para eliminar este reporte.');
        }

        try {
            $reporteId = str_pad($reporte->id, 3, '0', STR_PAD_LEFT);
            
            // Usar soft delete (esto marcará el registro como eliminado pero no lo borrará físicamente)
            $reporte->delete();

            // Si es una petición AJAX, devolver JSON
            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Reporte #{$reporteId} eliminado correctamente."
                ]);
            }

            return redirect()->route('reportes.index')
                ->with('success', "Reporte #{$reporteId} eliminado correctamente.");

        } catch (\Exception $e) {
            \Log::error('Error al eliminar reporte: ' . $e->getMessage());
            
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar el reporte.'
                ], 500);
            }

            return back()->with('error', 'Error al eliminar el reporte.');
        }
    }

    /**
     * Exportar un reporte (PDF, Excel, etc.)
     */
    public function export(Reporte $reporte, Request $request)
    {
        // Verificar que el reporte pertenece al usuario actual
        if ($reporte->user_id !== Auth::id()) {
            abort(403, 'No tienes permiso para exportar este reporte.');
        }

        $formato = $request->get('formato', 'pdf');

        try {
            switch ($formato) {
                case 'pdf':
                    return $this->exportToPdf($reporte);
                case 'excel':
                    return $this->exportToExcel($reporte);
                case 'csv':
                    return $this->exportToCsv($reporte);
                default:
                    return back()->with('error', 'Formato de exportación no válido.');
            }
        } catch (\Exception $e) {
            return back()->with('error', 'Error al exportar el reporte.');
        }
    }

    /**
     * Generar reportes automáticos por tipo
     */
    public function generateByType(Request $request, $tipo)
    {
        $tiposValidos = ['expedientes', 'promociones', 'estadisticas', 'general'];
        
        if (!in_array($tipo, $tiposValidos)) {
            return response()->json(['error' => 'Tipo de reporte no válido.'], 400);
        }

        try {
            // Generar contenido según el tipo
            $contenido = $this->generarContenidoPorTipo($tipo);
            
            $reporte = Reporte::create([
                'titulo' => 'Reporte Automático - ' . ucfirst($tipo),
                'descripcion' => 'Reporte generado automáticamente para ' . $tipo,
                'fecha_reporte' => now()->format('Y-m-d'),
                'tipo' => $tipo,
                'user_id' => Auth::id(),
                'estado' => 'activo',
                'contenido_json' => json_encode($contenido)
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Reporte automático generado exitosamente.',
                'reporte_id' => $reporte->id
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error al generar el reporte automático.'
            ], 500);
        }
    }

    /**
     * Métodos privados para exportación
     */
    private function exportToPdf(Reporte $reporte)
    {
        // Aquí implementarías la lógica para generar PDF
        // Puedes usar librerías como DomPDF o TCPDF
        $contenido = $this->generarContenidoParaExportacion($reporte);
        
        return Response::make($contenido, 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="reporte_' . $reporte->id . '.pdf"'
        ]);
    }

    private function exportToExcel(Reporte $reporte)
    {
        // Implementar exportación a Excel usando PhpSpreadsheet o Laravel Excel
        $contenido = $this->generarContenidoParaExportacion($reporte);
        
        return Response::make($contenido, 200, [
            'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
            'Content-Disposition' => 'attachment; filename="reporte_' . $reporte->id . '.xlsx"'
        ]);
    }

    private function exportToCsv(Reporte $reporte)
    {
        $contenido = $this->generarCsvContent($reporte);
        
        return Response::make($contenido, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="reporte_' . $reporte->id . '.csv"'
        ]);
    }

    /**
     * Generar contenido según el tipo de reporte
     */
    private function generarContenidoPorTipo($tipo)
    {
        $userId = Auth::id();
        
        switch ($tipo) {
            case 'expedientes':
                // Obtener datos de expedientes del usuario
                $expedientes = \App\Models\Expediente::where('user_id', $userId)->get();
                return [
                    'tipo' => 'expedientes',
                    'total_expedientes' => $expedientes->count(),
                    'expedientes_activos' => $expedientes->where('estado_actual', 'en_tramite')->count(),
                    'expedientes_finalizados' => $expedientes->where('estado_actual', 'finalizado')->count(),
                    'fecha_generacion' => now(),
                    'datos' => $expedientes->toArray()
                ];

            case 'promociones':
                // Obtener datos de promociones del usuario
                $promociones = \App\Models\Promocion::where('user_id', $userId)->get();
                return [
                    'tipo' => 'promociones',
                    'total_promociones' => $promociones->count(),
                    'fecha_generacion' => now(),
                    'datos' => $promociones->toArray()
                ];

            case 'estadisticas':
                return [
                    'tipo' => 'estadisticas',
                    'periodo' => now()->format('Y-m'),
                    'fecha_generacion' => now(),
                    'metricas' => [
                        'total_expedientes' => \App\Models\Expediente::where('user_id', $userId)->count(),
                        'total_promociones' => \App\Models\Promocion::where('user_id', $userId)->count(),
                        'total_reportes' => Reporte::where('user_id', $userId)->count(),
                    ]
                ];

            default:
                return [
                    'tipo' => 'general',
                    'fecha_generacion' => now(),
                    'usuario' => Auth::user()->name,
                    'resumen' => 'Reporte general del sistema'
                ];
        }
    }

    private function generarContenidoParaExportacion(Reporte $reporte)
    {
        // Generar contenido para exportación
        return "Contenido del reporte: " . $reporte->titulo;
    }

    private function generarCsvContent(Reporte $reporte)
    {
        $csv = "ID,Título,Descripción,Tipo,Fecha,Estado\n";
        $csv .= "{$reporte->id},{$reporte->titulo},{$reporte->descripcion},{$reporte->tipo},{$reporte->fecha_reporte},{$reporte->estado}";
        return $csv;
    }

    /**
     * Mostrar reportes eliminados (papelera)
     */
    public function trash()
    {
        $reportesEliminados = Reporte::where('user_id', Auth::id())
            ->onlyTrashed()
            ->orderBy('deleted_at', 'desc')
            ->paginate(10);

        return view('reportes.trash', compact('reportesEliminados'));
    }

    /**
     * Restaurar un reporte eliminado
     */
    public function restore($id)
    {
        $reporte = Reporte::where('user_id', Auth::id())
            ->onlyTrashed()
            ->findOrFail($id);

        try {
            $reporte->restore();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Reporte #{$reporte->id_formateado} restaurado correctamente."
                ]);
            }

            return redirect()->route('reportes.index')
                ->with('success', "Reporte #{$reporte->id_formateado} restaurado correctamente.");

        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al restaurar el reporte.'
                ], 500);
            }

            return back()->with('error', 'Error al restaurar el reporte.');
        }
    }

    /**
     * Eliminar permanentemente un reporte
     */
    public function forceDelete($id)
    {
        $reporte = Reporte::where('user_id', Auth::id())
            ->onlyTrashed()
            ->findOrFail($id);

        try {
            $reporteId = $reporte->id_formateado;
            $reporte->forceDelete();

            if (request()->ajax()) {
                return response()->json([
                    'success' => true,
                    'message' => "Reporte #{$reporteId} eliminado permanentemente."
                ]);
            }

            return redirect()->route('reportes.trash')
                ->with('success', "Reporte #{$reporteId} eliminado permanentemente.");

        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Error al eliminar permanentemente el reporte.'
                ], 500);
            }

            return back()->with('error', 'Error al eliminar permanentemente el reporte.');
        }
    }
}
