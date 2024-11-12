<x-app-layout>
    <div class="container mx-auto mt-16 px-6 sm:px-8 lg:px-16">
        <!-- Título Principal -->
        <h1 class="text-center text-8xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-indigo-600 via-blue-500 to-teal-400 mb-8 animate-text">
            AlertaSmart
        </h1>

        <!-- Separador -->
        <div class="mb-10">
            <hr class="border-t-2 border-gray-300 opacity-30">
        </div>

        <!-- Menú de Navegación -->
        <div class="flex justify-center space-x-16 mb-12">
            <a href="{{ route('report.history') }}" class="px-8 py-4 bg-gradient-to-r from-indigo-500 to-indigo-700 text-white font-bold rounded-lg shadow-xl transform hover:scale-110 hover:shadow-2xl hover:from-indigo-600 hover:to-indigo-800 transition duration-500 ease-in-out">
                Historial
            </a>
            <a href="{{ route('contact') }}" class="px-8 py-4 bg-gradient-to-r from-teal-500 to-teal-700 text-white font-bold rounded-lg shadow-xl transform hover:scale-110 hover:shadow-2xl hover:from-teal-600 hover:to-teal-800 transition duration-500 ease-in-out">
                Contáctanos
            </a>
        </div>

        <!-- Otro Separador -->
        <div class="mb-10">
            <hr class="border-t-2 border-gray-300 opacity-30">
        </div>

        <!-- Sección de Reporte de Problemas -->
        <div class="text-center">
            <h2 class="text-3xl font-semibold text-gray-800 mb-8 animate__animated animate__fadeIn">
                Reporta un Problema
            </h2>
            <div class="mb-8">
                <hr class="border-t-2 border-gray-300 opacity-30">
            </div>

            <!-- Botón de Reporte -->
            <a href="{{ route('report.form') }}" class="px-10 py-5 bg-gradient-to-r from-pink-500 to-pink-700 text-white font-semibold rounded-full shadow-2xl transform hover:scale-110 hover:shadow-2xl hover:from-pink-600 hover:to-pink-800 transition duration-500 ease-in-out">
                Reportar un Problema
            </a>
        </div>

        <!-- Notificación en la esquina inferior derecha -->
        @if (session('success'))
            <div id="successMessage" class="fixed bottom-5 right-5 bg-green-500 text-white font-bold py-3 px-6 rounded-lg shadow-lg animate__animated animate__fadeIn">
                {{ session('success') }}
            </div>
            <script>
                // Ocultar el mensaje después de 10 segundos
                setTimeout(() => {
                    const message = document.getElementById('successMessage');
                    if (message) {
                        message.style.display = 'none';
                    }
                }, 3000);
            </script>
        @endif
    </div>
</x-app-layout>
