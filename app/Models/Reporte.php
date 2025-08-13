<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Reporte extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * La tabla asociada con el modelo.
     */
    protected $table = 'reportes';

    /**
     * Los atributos que son asignables masivamente.
     */
    protected $fillable = [
        'titulo',
        'descripcion',
        'fecha_reporte',
        'tipo',
        'estado',
        'user_id',
        'contenido_json',
        'archivo_path',
        'formato_exportacion'
    ];

    /**
     * Los atributos que deben ser tratados como fechas.
     */
    protected $dates = [
        'fecha_reporte',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    /**
     * Los atributos que deben ser casteados a tipos nativos.
     */
    protected $casts = [
        'fecha_reporte' => 'date',
        'contenido_json' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    /**
     * Los valores por defecto para los atributos.
     */
    protected $attributes = [
        'estado' => 'activo',
        'tipo' => 'general'
    ];

    /**
     * Relación: Un reporte pertenece a un usuario
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relación: Un reporte puede tener muchos expedientes relacionados
     * (si el reporte es de tipo expedientes)
     */
    public function expedientes()
    {
        return $this->hasMany(Expediente::class, 'user_id', 'user_id')
                    ->when($this->tipo === 'expedientes', function ($query) {
                        return $query->where('created_at', '<=', $this->created_at);
                    });
    }

    /**
     * Relación: Un reporte puede tener muchas promociones relacionadas
     * (si el reporte es de tipo promociones)
     */
    public function promociones()
    {
        return $this->hasMany(Promocion::class, 'user_id', 'user_id')
                    ->when($this->tipo === 'promociones', function ($query) {
                        return $query->where('created_at', '<=', $this->created_at);
                    });
    }

    /**
     * Scope para filtrar reportes por tipo
     */
    public function scopeOfType($query, $tipo)
    {
        return $query->where('tipo', $tipo);
    }

    /**
     * Scope para filtrar reportes por estado
     */
    public function scopeOfStatus($query, $estado)
    {
        return $query->where('estado', $estado);
    }

    /**
     * Scope para obtener reportes del mes actual
     */
    public function scopeCurrentMonth($query)
    {
        return $query->whereMonth('created_at', Carbon::now()->month)
                    ->whereYear('created_at', Carbon::now()->year);
    }

    /**
     * Scope para obtener reportes de un rango de fechas
     */
    public function scopeBetweenDates($query, $fechaInicio, $fechaFin)
    {
        return $query->whereBetween('fecha_reporte', [$fechaInicio, $fechaFin]);
    }

    /**
     * Accessor: Obtener el ID formateado con ceros a la izquierda
     */
    public function getIdFormateadoAttribute()
    {
        return str_pad($this->id, 3, '0', STR_PAD_LEFT);
    }

    /**
     * Accessor: Obtener el nombre del tipo de reporte en español
     */
    public function getTipoNombreAttribute()
    {
        $tipos = [
            'expedientes' => 'Expedientes',
            'promociones' => 'Promociones',
            'estadisticas' => 'Estadísticas',
            'general' => 'General'
        ];

        return $tipos[$this->tipo] ?? 'Desconocido';
    }

    /**
     * Accessor: Obtener el nombre del estado en español
     */
    public function getEstadoNombreAttribute()
    {
        $estados = [
            'activo' => 'Activo',
            'archivado' => 'Archivado',
            'finalizado' => 'Finalizado',
            'pausado' => 'Pausado'
        ];

        return $estados[$this->estado] ?? 'Desconocido';
    }

    /**
     * Accessor: Obtener la fecha formateada para mostrar
     */
    public function getFechaFormateadaAttribute()
    {
        return $this->fecha_reporte ? $this->fecha_reporte->format('d/m/Y') : '';
    }

    /**
     * Accessor: Obtener la fecha de creación formateada
     */
    public function getFechaCreacionFormateadaAttribute()
    {
        return $this->created_at ? $this->created_at->format('d/m/Y H:i') : '';
    }

    /**
     * Accessor: Obtener el badge de estado con colores Bootstrap
     */
    public function getEstadoBadgeAttribute()
    {
        $badges = [
            'activo' => '<span class="badge bg-success">Activo</span>',
            'archivado' => '<span class="badge bg-secondary">Archivado</span>',
            'finalizado' => '<span class="badge bg-primary">Finalizado</span>',
            'pausado' => '<span class="badge bg-warning">Pausado</span>'
        ];

        return $badges[$this->estado] ?? '<span class="badge bg-dark">Desconocido</span>';
    }

    /**
     * Accessor: Obtener el badge de tipo con colores
     */
    public function getTipoBadgeAttribute()
    {
        $badges = [
            'expedientes' => '<span class="badge bg-info">Expedientes</span>',
            'promociones' => '<span class="badge bg-success">Promociones</span>',
            'estadisticas' => '<span class="badge bg-warning">Estadísticas</span>',
            'general' => '<span class="badge bg-secondary">General</span>'
        ];

        return $badges[$this->tipo] ?? '<span class="badge bg-dark">Desconocido</span>';
    }

    /**
     * Mutator: Asegurar que el título esté en formato título
     */
    public function setTituloAttribute($value)
    {
        $this->attributes['titulo'] = ucfirst(trim($value));
    }

    /**
     * Mutator: Limpiar la descripción
     */
    public function setDescripcionAttribute($value)
    {
        $this->attributes['descripcion'] = trim($value);
    }

    /**
     * Método para verificar si el reporte puede ser editado
     */
    public function puedeSerEditado()
    {
        return in_array($this->estado, ['activo', 'pausado']);
    }

    /**
     * Método para verificar si el reporte puede ser eliminado
     */
    public function puedeSerEliminado()
    {
        return $this->estado !== 'finalizado';
    }

    /**
     * Método para obtener el resumen del contenido JSON
     */
    public function getResumenContenido()
    {
        if (!$this->contenido_json || !is_array($this->contenido_json)) {
            return 'Sin contenido disponible';
        }

        $contenido = $this->contenido_json;
        
        switch ($this->tipo) {
            case 'expedientes':
                $total = $contenido['total_expedientes'] ?? 0;
                return "Total de expedientes: {$total}";
                
            case 'promociones':
                $total = $contenido['total_promociones'] ?? 0;
                return "Total de promociones: {$total}";
                
            case 'estadisticas':
                return "Estadísticas del período: " . ($contenido['periodo'] ?? 'No especificado');
                
            default:
                return "Reporte general del sistema";
        }
    }

    /**
     * Método para marcar el reporte como finalizado
     */
    public function finalizar()
    {
        $this->update(['estado' => 'finalizado']);
    }

    /**
     * Método para archivar el reporte
     */
    public function archivar()
    {
        $this->update(['estado' => 'archivado']);
    }

    /**
     * Método para reactivar el reporte
     */
    public function reactivar()
    {
        $this->update(['estado' => 'activo']);
    }

    /**
     * Método estático para obtener los tipos de reporte disponibles
     */
    public static function getTiposDisponibles()
    {
        return [
            'expedientes' => 'Expedientes',
            'promociones' => 'Promociones',
            'estadisticas' => 'Estadísticas',
            'general' => 'General'
        ];
    }

    /**
     * Método estático para obtener los estados disponibles
     */
    public static function getEstadosDisponibles()
    {
        return [
            'activo' => 'Activo',
            'archivado' => 'Archivado',
            'finalizado' => 'Finalizado',
            'pausado' => 'Pausado'
        ];
    }
}
