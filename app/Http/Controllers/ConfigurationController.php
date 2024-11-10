<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class ConfigurationController extends Controller
{
    public function edit()
    {
        // Muestra el formulario de configuraciones
        return view('admin.configurations');
    }

    public function update(Request $request)
    {
        // Validación de los datos
        $request->validate([
            'app_name' => 'required|string|max:255',
            'theme' => 'required|in:light,dark',
        ]);

        // Actualización de configuraciones
        config(['app.name' => $request->input('app_name')]);
        config(['app.theme' => $request->input('theme')]);

        // Aquí podrías guardar estas configuraciones en una base de datos si es necesario
        // o en un archivo de configuración.

        return redirect()->route('configurations.edit')->with('success', 'Configuraciones actualizadas con éxito.');
    }
}
