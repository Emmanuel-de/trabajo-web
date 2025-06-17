<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; // Si planeas actualizar contraseñas aquí
use Illuminate\Validation\Rule; // Para la validación unique con excepción

class ProfileController extends Controller
{
    /**
     * Muestra el formulario de perfil del usuario.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $user = Auth::user(); // Obtiene el usuario autenticado
        return view('perfil', compact('user'));
    }

    /**
     * Actualiza la información del perfil del usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido_paterno' => 'required|string|max:255',
            'apellido_materno' => 'nullable|string|max:255',
            'genero' => 'required|in:masculino,femenino',
            'escolaridad' => 'required|string|max:255',
            'telefono_oficina' => 'nullable|string|max:20',
            'telefono_particular' => 'nullable|string|max:20',
            'telefono_celular' => 'nullable|string|max:20',
            'extension' => 'nullable|string|max:10',
            'calle' => 'nullable|string|max:255',
            'colonia' => 'nullable|string|max:255',
            'codigo_postal' => 'nullable|string|max:10',
            'municipio' => 'nullable|string|max:255',
            // Para el email, usamos Rule::unique para ignorar el email actual del usuario
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
            // Si también actualizas contraseña, añadirías aquí:
            // 'current_password' => 'nullable|required_with:password|current_password',
            // 'password' => 'nullable|string|min:6|confirmed',
        ]);

        // Actualiza los datos del usuario
        $user->name = $request->nombre; // Asumiendo que 'name' en tu tabla es para el nombre completo o solo el nombre
        $user->apellido_paterno = $request->apellido_paterno;
        $user->apellido_materno = $request->apellido_materno;
        $user->genero = $request->genero;
        $user->escolaridad = $request->escolaridad;
        $user->telefono_oficina = $request->telefono_oficina;
        $user->telefono_particular = $request->telefono_particular;
        $user->telefono_celular = $request->telefono_celular;
        $user->extension = $request->extension;
        $user->calle = $request->calle;
        $user->colonia = $request->colonia;
        $user->codigo_postal = $request->codigo_postal;
        $user->municipio = $request->municipio;
        $user->email = $request->email;
        // Si actualizas contraseña, descomentar y añadir lógica aquí:
        // if ($request->filled('password')) {
        //     $user->password = Hash::make($request->password);
        // }
        $user->save();

        return redirect()->route('perfil')->with('success', 'Perfil actualizado correctamente.');
    }
}
