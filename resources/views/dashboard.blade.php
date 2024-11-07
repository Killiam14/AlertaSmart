<!-- resources/views/dashboard.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-10">
        <!-- Título Principal -->
        <h1 class="text-center text-3xl font-bold mb-6">AlertaSmart</h1>

        <!-- Separador -->
        <hr class="border-t-2 border-gray-300 mb-4">

        <!-- Menú de Navegación -->
        <div class="flex justify-center space-x-8 mb-6">
            <a href="{{ route('report.history') }}" class="px-4 py-2 bg-white text-black font-semibold rounded-lg hover:bg-gray-800">Historial</a>
            <a href="#" class="text-lg font-medium text-gray-700 hover:text-gray-900">Contacto</a>
        </div>

        <!-- Otro Separador -->
        <hr class="border-t-2 border-gray-300 mb-4">

        <!-- Sección de Reporte de Problemas -->
        <div class="text-center">
            <h2 class="text-xl font-semibold mb-4">Reporta un Problema</h2>
            <hr class="border-t-2 border-gray-300 mb-6">
            
            <!-- Botón de Reporte -->
            <a href="{{ route('report.form') }}" class="px-6 py-3 bg-white text-black font-semibold rounded-lg hover:bg-gray-800">
                Reportar un Problema
            </a>
        </div>
    </div>
</x-app-layout>
