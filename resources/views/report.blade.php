<!-- resources/views/report.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-6">Formulario Reporte</h1>

        <form action="{{ route('report.submit') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-4">
                <label for="description" class="block text-lg font-medium">Descripción</label>
                <textarea id="description" name="description" rows="4" class="w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <!-- Campo de ubicación y mapa -->
            <div class="mb-4">
                <label for="location" class="block text-lg font-medium">Ubicación</label>
                <input type="text" id="location" name="location" class="w-full p-2 border border-gray-300 rounded" placeholder="Seleccione una ubicación en el mapa" readonly>
            </div>

            <!-- Mapa de Leaflet -->
            <div id="map" style="height: 400px; margin-bottom: 1rem;"></div>

            <!-- Resto del formulario -->
            <div class="mb-4">
                <label for="fault_type" class="block text-lg font-medium">Tipo de Fallo</label>
                <input type="text" id="fault_type" name="fault_type" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="company" class="block text-lg font-medium">Empresa Pertinente</label>
                <input type="text" id="company" name="company" class="w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-medium">Subir una Imagen</label>
                <input type="file" id="image" name="image" class="w-full p-2 border border-gray-300 rounded" accept="image/*">
            </div>

            <div class="text-center">
                <button type="submit" class="px-6 py-3 bg-blue-500 text-black font-semibold rounded-lg hover:bg-blue-600">
                    Enviar Reporte
                </button>
            </div>
        </form>
    </div>

    <!-- Modal de Confirmación -->
    <div id="confirmationModal" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded-lg shadow-md w-1/3">
            <h2 class="text-xl font-semibold mb-4">¡Éxito!</h2>
            <p>Tu reporte ha sido enviado correctamente.</p>
            <div class="flex justify-end mt-4">
                <button id="closeModal" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Ok</button>
            </div>
        </div>
    </div>

    <!-- Scripts de Leaflet y JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Inicializar el mapa cuando el documento esté listo
        document.addEventListener("DOMContentLoaded", function() {
            // Centrar el mapa en una ubicación por defecto
            var map = L.map('map').setView([4.7110, -74.0721], 13); // Bogotá, Colombia

            // Cargar capa de OpenStreetMap
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            // Variable para el marcador
            var marker;

            // Función para actualizar el campo de ubicación y el marcador
            function onMapClick(e) {
                // Eliminar marcador existente
                if (marker) {
                    map.removeLayer(marker);
                }

                // Agregar un nuevo marcador
                marker = L.marker(e.latlng).addTo(map);

                // Actualizar el campo de texto con las coordenadas
                document.getElementById('location').value = `${e.latlng.lat}, ${e.latlng.lng}`;
            }

            // Evento para detectar clics en el mapa
            map.on('click', onMapClick);
        });

        // Mostrar el modal si hay un mensaje de éxito en la sesión
        window.onload = function() {
            @if (session('success'))
                document.getElementById('confirmationModal').classList.remove('hidden');
            @endif
        }

        // Cerrar el modal y redirigir a la pantalla principal
        document.getElementById('closeModal').onclick = function() {
            document.getElementById('confirmationModal').classList.add('hidden');
            window.location.href = "{{ route('dashboard') }}";
        }
    </script>
</x-app-layout>
