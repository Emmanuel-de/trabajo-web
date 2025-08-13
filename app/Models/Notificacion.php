<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notificacion extends Model
{
    use HasFactory;

    protected $table = 'notificaciones';

    protected $fillable = [
        'tipo_asunto',
        'estado',
        'fecha',
        'expediente',
        'descripcion',
    ];

    protected $casts = [
        'fecha' => 'date',
    ];
}
