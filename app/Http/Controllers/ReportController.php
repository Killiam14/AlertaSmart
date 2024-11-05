<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    // Mostrar el formulario para reportar un problema
    public function create()
    {
        return view('reports.create'); // Redirigir a la vista del formulario
    }

    // Almacenar el reporte en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'location' => 'required|string',
            'fault_type' => 'required|string',
            'company' => 'required|string',
            'image' => 'nullable|image|max:2048', // Validar imagen si se sube
        ]);

        // Crear un nuevo reporte
        $report = Report::create($request->except('image'));

        // Manejar la carga de imagen si se proporciona
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images', 'public'); // Guarda la imagen en el directorio 'public/images'
            $report->image_path = $path;
            $report->save();
        }

        return redirect()->route('reports.create')->with('success', 'Reporte creado exitosamente.');
    }
}
