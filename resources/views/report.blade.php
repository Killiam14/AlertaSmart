<x-app-layout>
    <div class="container mx-auto mt-16 px-6 sm:px-8 lg:px-16">
        <!-- Título Principal -->
        <h1 class="text-center text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-purple-400 to-blue-500 mb-10">
            Formulario de Reporte
        </h1>

        <!-- Formulario -->
        <form action="{{ route('report.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-xl rounded-lg p-8">
            @csrf
            <div class="space-y-6">
                <!-- Descripción -->
                <div class="mb-6">
                    <label for="description" class="block text-lg font-medium text-gray-700">Descripción</label>
                    <textarea id="description" name="description" rows="4" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 text-gray-900" required></textarea>
                </div>

                <!-- Ubicación y Mapa -->
                <div class="mb-6">
                    <label for="location" class="block text-lg font-medium text-gray-700">Ubicación</label>
                    <input type="text" id="location" name="location" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 text-gray-900" placeholder="Seleccione una ubicación en el mapa" readonly>
                </div>

                <!-- Mapa de Leaflet -->
                <div id="map" style="height: 400px; border-radius: 12px; margin-bottom: 1.5rem;"></div>

                <!-- Tipo de Fallo -->
                <div class="mb-6">
                    <label for="fault_type" class="block text-lg font-medium text-gray-700">Tipo de Fallo</label>
                    <input type="text" id="fault_type" name="fault_type" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 text-gray-900" required>
                </div>

                <!-- Empresa Pertinente -->
                <div class="mb-6">
                    <label for="company" class="block text-lg font-medium text-gray-700">Empresa Pertinente</label>
                    <input type="text" id="company" name="company" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 text-gray-900" required>
                </div>

                <!-- Subir Imagen -->
                <div class="mb-6">
                    <label for="image" class="block text-lg font-medium text-gray-700">Subir una Imagen</label>
                    <input type="file" id="image" name="image" class="w-full p-4 bg-gray-100 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-purple-500 text-gray-900" accept="image/*">
                </div>

                <!-- Botón de Enviar -->
                <div class="text-center">
                    <button type="submit" class="w-full py-3 px-6 bg-gradient-to-r from-blue-500 to-purple-600 text-white font-semibold rounded-lg hover:bg-gradient-to-l hover:from-purple-500 hover:to-blue-500 transition ease-in-out duration-300">
                        Enviar Reporte
                    </button>
                </div>
            </div>
        </form>
    </div>

    <!-- Notificación Flotante -->
    <div id="floatingNotification" class="fixed top-10 right-10 bg-green-500 text-white text-lg font-semibold px-4 py-3 rounded-lg shadow-lg hidden">
        ¡Tu reporte ha sido enviado con éxito!
    </div>

    <!-- Scripts de Leaflet y JavaScript -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

    <script>
        // Inicializar el mapa cuando el documento esté listo
        document.addEventListener("DOMContentLoaded", function() {
            var map = L.map('map').setView([4.3378, -74.3638], 13);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            var marker;

            function onMapClick(e) {
                if (marker) {
                    map.removeLayer(marker);
                }
                marker = L.marker(e.latlng).addTo(map);
                document.getElementById('location').value = `${e.latlng.lat}, ${e.latlng.lng}`;
            }

            map.on('click', onMapClick);
        });

        window.onload = function() {
            @if (session('success'))
                var notification = document.getElementById('floatingNotification');
                notification.classList.remove('hidden');
                setTimeout(function() {
                    notification.classList.add('hidden');
                }, 10000);
            @endif
        };
    </script>
</x-app-layout>
