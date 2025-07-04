<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Mostrar el formulario de login
     */
    public function showLoginForm()
    {
        return view('homepage');
    }

    /**
     * Procesar el login del usuario
     */
    public function login(Request $request)
    {
        // Validar los datos de entrada
        $validator = Validator::make($request->all(), [
            'usuario' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'usuario.required' => 'El campo usuario es obligatorio.',
            'password.required' => 'El campo contraseña es obligatorio.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password'));
        }

        // Determinar el campo de login (email o username)
        // Se asume que 'usuario' puede ser tanto email como username
        $loginField = filter_var($request->input('usuario'), FILTER_VALIDATE_EMAIL) ? 'email' : 'username';

        $credentials = [
            $loginField => $request->usuario,
            'password' => $request->password,
        ];

        // Intentar autenticación
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            // Regenerar sesión por seguridad
            $request->session()->regenerate();
            
            // Obtener el usuario autenticado
            $user = Auth::user();
            
            // Guardar información adicional en la sesión si es necesario
            session(['user_name' => $user->name]);
            
            // Redireccionar a la página de usuario
            return redirect()->intended(route('usuario'))->with('success', 'Bienvenido ' . $user->name);
        }

        // Si la autenticación falla, redirige de vuelta con un mensaje de error personalizado
        return redirect()->back()
            ->withErrors(['login' => 'Tu usuario o contraseña son incorrectos.']) // Mensaje de error modificado aquí
            ->withInput($request->except('password'));
    }

    /**
     * Cerrar sesión del usuario
     */
    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        return redirect()->route('homepage')->with('success', 'Sesión cerrada correctamente.');
    }

    /**
     * Mostrar el formulario de registro
     */
    public function showRegisterForm()
    {
        return view('register');
    }

    /**
     * Procesar el registro de usuario
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe ser válido.',
            'email.unique' => 'Este email ya está registrado.',
            'username.required' => 'El usuario es obligatorio.',
            'username.unique' => 'Este usuario ya está registrado.',
            'password.required' => 'La contraseña es obligatoria.',
            'password.min' => 'La contraseña debe tener al menos 6 caracteres.',
            'password.confirmed' => 'Las contraseñas no coinciden.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput($request->except('password', 'password_confirmation'));
        }

        // Crear nuevo usuario
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        // Autenticar automáticamente al usuario
        Auth::login($user);

        return redirect()->route('usuario')->with('success', 'Registro exitoso. Bienvenido ' . $user->name);
    }
}


