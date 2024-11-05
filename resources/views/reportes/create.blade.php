<!-- resources/views/reports/create.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-6">Formulario Reporte</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">{{ session('success') }}</div>
        @endif

        <form action="{{ route('reports.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="description" class="block text-lg font-medium">Descripción</label>
                <textarea name="description" id="description" class="mt-1 block w-full p-2 border border-gray-300 rounded" required></textarea>
            </div>

            <div class="mb-4">
                <label for="location" class="block text-lg font-medium">Ubicación</label>
                <input type="text" name="location" id="location" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="fault_type" class="block text-lg font-medium">Tipo de Fallo</label>
                <input type="text" name="fault_type" id="fault_type" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="company" class="block text-lg font-medium">Empresa Pertinente</label>
                <input type="text" name="company" id="company" class="mt-1 block w-full p-2 border border-gray-300 rounded" required>
            </div>

            <div class="mb-4">
                <label for="image" class="block text-lg font-medium">Subir una Imagen</label>
                <input type="file" name="image" id="image" class="mt-1 block w-full p-2 border border-gray-300 rounded" accept="image/*">
            </div>

            <button type="submit" class="px-6 py-3 bg-black text-white font-semibold rounded-lg hover:bg-gray-800">
                Enviar Reporte
            </button>
        </form>
    </div>
</x-app-layout>
