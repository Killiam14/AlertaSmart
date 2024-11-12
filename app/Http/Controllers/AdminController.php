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

    // Método para gestionar usuarios
    public function manageUsers()
    {
        // Obtener todos los usuarios
        $users = User::all();

        // Pasar los usuarios a la vista
        return view('admin.manage-users', compact('users'));
    }

    public function manageReports()
    {
        // Obtener todos los reportes
        $reports = Report::with('user')->get();

        // Pasar los reportes a la vista
        return view('admin.manage-reports', compact('reports'));
    }

    public function viewReport($id)
    {
        // Buscar el reporte por ID
        $report = Report::findOrFail($id);

        // Retornar la vista con el reporte
        return view('admin.view-report', compact('report'));
    }

    public function destroyReport($id)
    {
        $report = Report::findOrFail($id);

        // Eliminar la imagen asociada si existe
        if ($report->image) {
            Storage::disk('public')->delete($report->image);
        }

        // Eliminar el reporte de la base de datos
        $report->delete();

        return redirect()->route('admin.reports')->with('success', 'Reporte eliminado correctamente');
    }
}
