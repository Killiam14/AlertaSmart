<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50">

    <!-- Navbar o Barra de navegación -->
    <nav class="bg-green-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Configuraciones</h1>
            </div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-200">Panel de Administración</a>
                
                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-200">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <!-- Sección de configuraciones -->
        <div class="bg-white p-6 rounded-lg shadow-lg bg-opacity-80 border border-green-300">
            <h2 class="text-2xl font-bold text-gray-800">Ajustes Generales</h2>
            <p class="text-gray-600">Aquí puedes configurar los parámetros de la aplicación.</p>
        </div>

        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulario para cambiar configuraciones -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-lg bg-opacity-80 border border-green-300">
            <form action="{{ route('configurations.update') }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="app_name" class="block text-gray-700">Nombre de la aplicación</label>
                    <input type="text" id="app_name" name="app_name" class="mt-2 p-2 w-full border border-gray-300 rounded" value="{{ config('app.name') }}" required>
                </div>

                <div class="mb-4">
                    <label for="theme" class="block text-gray-700">Tema</label>
                    <select id="theme" name="theme" class="mt-2 p-2 w-full border border-gray-300 rounded">
                        <option value="light" {{ config('app.theme') === 'light' ? 'selected' : '' }}>Claro</option>
                        <option value="dark" {{ config('app.theme') === 'dark' ? 'selected' : '' }}>Oscuro</option>
                    </select>
                </div>

                <div class="flex justify-end">
                    <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-500">Guardar Configuraciones</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
