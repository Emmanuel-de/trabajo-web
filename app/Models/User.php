<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens; // Esta línea debe estar

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable; // HasApiTokens debe estar aquí
    
    protected $fillable = [
        'name',
        'email',
        'password',
        'nombre',
        'apellido_paterno',
        'apellido_materno',
        'genero',
        'escolaridad',
        'telefono_oficina',
        'extension',
        'telefono_particular',
        'telefono_celular',
        'calle',
        'numero',
        'entre_calles',
        'colonia',
        'codigo_postal',
        'pais',
        'estado',
        'municipio',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function expedientes()
    {
        return $this->hasMany(Expediente::class);
    }

    public function promociones()
    {
        return $this->hasMany(Promocion::class);
    }
}