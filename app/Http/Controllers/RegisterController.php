<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Mostrar el formulario de registro
     */
    public function showRegistrationForm()
    {
        return view('registro');
    }

    /**
     * Procesar el formulario de registro
     */
    public function register(Request $request)
    {
        // Validar los datos del formulario
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Crear el usuario
        $user = $this->create($request->all());

        // Opcional: Autenticar automáticamente al usuario después del registro
        // auth()->login($user);

        // Redirigir con mensaje de éxito
        return redirect()->route('homepage')
            ->with('success', '¡Registro completado exitosamente! Ya puede iniciar sesión.');
    }

    /**
     * Validar los datos del formulario
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            // Datos personales
            'nombre' => ['required', 'string', 'max:255'],
            'apellido_paterno' => ['required', 'string', 'max:255'],
            'apellido_materno' => ['nullable', 'string', 'max:255'],
            'genero' => ['required', 'in:masculino,femenino,otro'],
            'escolaridad' => ['required', 'in:primaria,secundaria,bachillerato,licenciatura,posgrado'],

            // Teléfonos (al menos uno requerido)
            'telefono_oficina' => ['nullable', 'string', 'max:10'],
            'extension' => ['nullable', 'string', 'max:10'],
            'telefono_particular' => ['nullable', 'string', 'max:10'],
            'telefono_celular' => ['nullable', 'string', 'max:10'],

            // Domicilio
            'calle' => ['required', 'string', 'max:255'],
            'numero' => ['required', 'string', 'max:20'],
            'entre_calles' => ['nullable', 'string', 'max:255'],
            'colonia' => ['nullable', 'string', 'max:255'],
            'codigo_postal' => ['nullable', 'string', 'max:5'],
            'pais' => ['required', 'in:México,Otro'],
            'estado' => ['required', 'string', 'max:255'],
            'municipio' => ['required', 'string', 'max:255'],

            // Cuenta
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ], [
            // Mensajes personalizados en español
            'nombre.required' => 'El nombre es obligatorio.',
            'apellido_paterno.required' => 'El apellido paterno es obligatorio.',
            'genero.required' => 'Debe seleccionar un género.',
            'genero.in' => 'El género seleccionado no es válido.',
            'escolaridad.required' => 'Debe seleccionar una escolaridad.',
            'escolaridad.in' => 'La escolaridad seleccionada no es válida.',
            'calle.required' => 'La calle es obligatoria.',
            'numero.required' => 'El número es obligatorio.',
            'pais.required' => 'Debe seleccionar un país.',
            'pais.in' => 'El país seleccionado no es válido.',
            'estado.required' => 'El estado es obligatorio.',
            'municipio.required' => 'El municipio es obligatorio.',
            'email.required' => 'El correo electrónico es obligatorio.',
            'email.email' => 'Debe ingresar un correo electrónico válido.',
            'email.unique' => 'Este correo electrónico ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);
    }

    /**
     * Crear un nuevo usuario
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['nombre'] . ' ' . $data['apellido_paterno'] . ' ' . ($data['apellido_materno'] ?? ''),
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            
            // Datos adicionales (necesitarás agregar estos campos a la migración de users)
            'nombre' => $data['nombre'],
            'apellido_paterno' => $data['apellido_paterno'],
            'apellido_materno' => $data['apellido_materno'] ?? null,
            'genero' => $data['genero'],
            'escolaridad' => $data['escolaridad'],
            
            // Teléfonos
            'telefono_oficina' => $data['telefono_oficina'] ?? null,
            'extension' => $data['extension'] ?? null,
            'telefono_particular' => $data['telefono_particular'] ?? null,
            'telefono_celular' => $data['telefono_celular'] ?? null,
            
            // Domicilio
            'calle' => $data['calle'],
            'numero' => $data['numero'],
            'entre_calles' => $data['entre_calles'] ?? null,
            'colonia' => $data['colonia'] ?? null,
            'codigo_postal' => $data['codigo_postal'] ?? null,
            'pais' => $data['pais'],
            'estado' => $data['estado'],
            'municipio' => $data['municipio'],
        ]);
    }

    /**
     * Validación personalizada adicional
     */
    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $data = $validator->getData();
            
            // Validar que al menos un teléfono esté presente
            if (empty($data['telefono_oficina']) && 
                empty($data['telefono_particular']) && 
                empty($data['telefono_celular'])) {
                $validator->errors()->add('telefono', 'Debe proporcionar al menos un número de teléfono.');
            }
        });
    }
}