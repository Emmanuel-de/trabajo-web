<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


    class AyudaController extends Controller {
    public function show() {
        $user = auth()->user();
        return view('ayuda', compact('user'));
    }
}

