<?php

namespace App\Http\Controllers;

use App\Models\Report; // Asegúrate de importar el modelo Report
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard'); // Muestra la vista del dashboard
    }

    public function showHistory()
    {
        // Obtener todos los reportes del usuario autenticado
        $reports = Report::where('user_id', auth()->id())->get();
        return view('history', compact('reports')); // Muestra la vista del historial con los reportes
    }
    
    public function showContact()
    {
        return view('contact');
    }
}
