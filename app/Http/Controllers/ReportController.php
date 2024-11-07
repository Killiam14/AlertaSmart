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
            'location' => 'required|string', // Este campo ahora contendrá "latitud, longitud"
            'fault_type' => 'required|string',
            'company' => 'required|string',
            'image' => 'nullable|image|max:2048', // Máximo 2MB
        ]);

        // Manejo del archivo de imagen si se sube
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
        }

        // Extraer latitud y longitud del campo de ubicación
        $coordinates = explode(',', $request->location);
        $latitude = isset($coordinates[0]) ? trim($coordinates[0]) : null;
        $longitude = isset($coordinates[1]) ? trim($coordinates[1]) : null;

        // Guardar los datos en la base de datos
        Report::create([
            'description' => $request->description,
            'location' => $request->location, // Guarda el texto de ubicación
            'latitude' => $latitude, // Guarda la latitud
            'longitude' => $longitude, // Guarda la longitud
            'fault_type' => $request->fault_type,
            'company' => $request->company,
            'image' => $imagePath, // Guarda la ruta de la imagen
            'user_id' => auth()->id(), // Guarda el ID del usuario aquí 
        ]);

        return redirect()->route('dashboard')->with('success', 'Reporte enviado con éxito.');
    }
}
