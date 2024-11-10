<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Report; // Importa el modelo Report
use App\Models\User;   // Importa el modelo User
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Verificar si el usuario tiene el rol 'admin'
        if (Auth::user()->role !== 'admin') {
            return redirect()->route('dashboard'); // Redirige si no es admin
        }

        // Si es admin, mostrar la vista de administración
        return view('admin.dashboard');
    }

    public function manageUsers()
    {
        // Lógica para obtener los usuarios
        $users = User::all(); // Ejemplo, puedes ajustar esto según tus necesidades
        return view('admin.users', compact('users'));
    }

    // Métodos para gestionar reportes y configuraciones
    public function manageReports()
    {
        // Lógica para obtener los reportes
        $reports = Report::all(); // Ejemplo, ajusta según el modelo Report
        return view('admin.reports', compact('reports'));
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function updateSettings(Request $request)
    {
        // Lógica para actualizar las configuraciones
        // Ejemplo: Guardar en el archivo de configuración o en la base de datos
        return redirect()->route('admin.settings')->with('success', 'Configuraciones actualizadas');
    }

}
