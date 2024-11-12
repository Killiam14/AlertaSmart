<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Ver Reporte</h1>
            </div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-400">Panel de Administración</a>
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-400">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Reporte #{{ $report->id }}</h2>
            <p class="text-gray-600">Detalles del reporte.</p>
            
            
            <!-- Descripción del reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Descripción:</h3>
                <p class="text-gray-600">{{ $report->description }}</p>
            </div>
            
            <!-- Ubicación del reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Ubicación:</h3>
                <p class="text-gray-600">{{ $report->location }}</p>
            </div>

            <!-- Tipo de fallo del reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Tipo de Fallo:</h3>
                <p class="text-gray-600">{{ $report->fault_type }}</p> <!-- Tipo de fallo -->
            </div>

            <!-- Empresa del reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Empresa:</h3>
                <p class="text-gray-600">{{ $report->company }}</p>
            </div>

            <!-- Imagen asociada al reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Imagen:</h3>
                @if ($report->image)
                    <img src="{{ asset('storage/' . $report->image) }}" alt="Imagen del reporte" class="max-w-full h-auto rounded-lg shadow-md">
                @else
                    <p class="text-gray-600">No hay imagen asociada a este reporte.</p>
                @endif
            </div>

            <!-- Fecha de Creación -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Fecha de Creación:</h3>
                <p class="text-gray-600">{{ $report->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <!-- Usuario que creó el reporte -->
            <div class="mt-6">
                <h3 class="font-semibold text-gray-800">Usuario:</h3>
                <p class="text-gray-600">{{ $report->user ? $report->user->name : 'Usuario eliminado' }}</p>
            </div>
        </div>
    </div>

</body>
</html>
