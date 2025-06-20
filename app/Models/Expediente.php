<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expediente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id', // ¡Importante! Si asignas el user_id al crear, debe estar aquí.
        'juzgado',
        'numero_expediente',
        'juicio',
        'promovente',
        'demandado',
        'fecha_inicio',
        'estado_actual',
        'observaciones',
    ];

    /**
     * Get the user that owns the expediente.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
