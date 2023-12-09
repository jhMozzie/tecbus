<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EstudianteController extends Controller
{
    public function EstudianteDashboard()
    {
        return view('estudiante.estudiante_dashboard');
    }
}
