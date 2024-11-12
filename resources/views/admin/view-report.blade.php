<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Reporte</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
    <!-- CSS de Leaflet para el mapa -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>
<body class="bg-green-50">

    <!-- Navbar -->
    <nav class="bg-green-700 p-4 text-white shadow-lg">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Ver Reporte</h1>
            </div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-green-200">Panel de Administración</a>
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4">
                    @csrf
                    <button type="submit" class="text-white hover:text-green-200">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <!-- Título -->
        <div class="bg-white p-6 rounded-lg shadow-md border-l-8 border-green-600">
            <h2 class="text-2xl font-bold text-green-800">Reporte #{{ $report->id }}</h2>
            <p class="text-gray-700">Detalles del reporte.</p>
        </div>

        <!-- Detalles del Reporte -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md border-l-8 border-green-600">
            <!-- Descripción -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Descripción:</h3>
                <p class="text-gray-700">{{ $report->description }}</p>
            </div>

            <!-- Ubicación -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Ubicación:</h3>
                <p class="text-gray-700">{{ $report->location }}</p>
                <!-- Contenedor para el mapa -->
                <div id="map" class="w-full h-64 mt-4 rounded-lg shadow-md border border-green-500"></div>
            </div>

            <!-- Tipo de fallo -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Tipo de Fallo:</h3>
                <p class="text-gray-700">{{ $report->fault_type }}</p>
            </div>

            <!-- Empresa -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Empresa:</h3>
                <p class="text-gray-700">{{ $report->company }}</p>
            </div>

            <!-- Imagen -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Imagen:</h3>
                @if ($report->image)
                    <img src="{{ asset('storage/' . $report->image) }}" alt="Imagen del reporte" class="max-w-full h-auto rounded-lg shadow-md border border-green-500">
                @else
                    <p class="text-gray-700">No hay imagen asociada a este reporte.</p>
                @endif
            </div>

            <!-- Fecha de Creación -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Fecha de Creación:</h3>
                <p class="text-gray-700">{{ $report->created_at->format('d/m/Y H:i') }}</p>
            </div>

            <!-- Usuario que creó el reporte -->
            <div class="mb-4">
                <h3 class="font-semibold text-green-800">Usuario:</h3>
                <p class="text-gray-700">{{ $report->user ? $report->user->name : 'Usuario eliminado' }}</p>
            </div>
        </div>
    </div>

    <!-- JavaScript de Leaflet -->
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Reemplaza estas variables con las coordenadas reales del reporte
        const latitude = {{ $report->latitude }};
        const longitude = {{ $report->longitude }};

        // Inicializar el mapa
        const map = L.map('map').setView([latitude, longitude], 13);

        // Cargar las capas de OpenStreetMap
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '© OpenStreetMap'
        }).addTo(map);

        // Agregar un marcador en las coordenadas
        L.marker([latitude, longitude]).addTo(map)
            .bindPopup('Ubicación del reporte')
            .openPopup();
    </script>
</body>
</html>
