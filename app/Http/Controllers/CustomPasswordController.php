<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomPasswordController extends Controller
{
    /**
     * Muestra el formulario para solicitar un enlace de restablecimiento de contraseña.
     *
     * @return \Illuminate\View\View
     */
    public function showLinkRequestForm()
    {
        return view('recuperar_contrasena');
    }
}