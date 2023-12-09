<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    public function ProfesorDashboard()
    {
        return view('profesor.profesor_dashboard');
    }
}
