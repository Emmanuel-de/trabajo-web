<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    use HasFactory;

    protected $table = 'promociones';

    protected $fillable = [
        'user_id',
        'expediente_id', 
        'nombre_promocion',
        'contenido_promocion',
        'tipo_accion',
        'estado',
        'archivo_anexo',
        'certificado_firma',
        'fecha_generacion',
        'fecha_firma',
        'fecha_envio',
        'observaciones'
    ];

    protected $casts = [
        'fecha_generacion' => 'datetime',
        'fecha_firma' => 'datetime',
        'fecha_envio' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function expediente()
    {
        return $this->belongsTo(Expediente::class);
    }
}

