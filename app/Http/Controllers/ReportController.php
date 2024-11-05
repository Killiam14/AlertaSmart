<?php

// app/Http/Controllers/ReportController.php

namespace App\Http\Controllers;

use App\Models\Report; // Asegúrate de importar el modelo Report
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function showForm()
    {
        return view('report');
    }

    public function submitReport(Request $request)
    {
        $request->validate([
            'description' => 'required|string',
            'location' => 'required|string',
            'fault_type' => 'required|string',
            'company' => 'required|string',
            'image' => 'nullable|image|max:2048', // Máximo 2MB
        ]);

        // Manejo del archivo de imagen si se sube
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Guardar los datos en la base de datos
        Report::create([
            'description' => $request->description,
            'location' => $request->location,
            'fault_type' => $request->fault_type,
            'company' => $request->company,
            'image' => $imagePath, // Guarda la ruta de la imagen
        ]);

        return redirect()->route('dashboard')->with('success', 'Reporte enviado con éxito.');
    }
}