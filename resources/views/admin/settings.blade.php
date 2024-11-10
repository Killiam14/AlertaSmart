<!-- resources/views/admin/settings.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Configuraciones</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar o Barra de navegación -->
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Panel de Administración</h1>
            </div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-400">Dashboard</a>
                <a href="{{ route('logout') }}" class="ml-4 text-white hover:text-gray-400">Cerrar sesión</a>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Configuraciones</h2>
            <p class="text-gray-600">Ajusta las opciones generales de la aplicación.</p>
        </div>

        <!-- Formulario de Configuraciones -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.settings.update') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="site_name" class="block text-sm font-medium text-gray-700">Nombre del Sitio</label>
                    <input type="text" id="site_name" name="site_name" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('site_name') }}">
                </div>
                <div class="mb-4">
                    <label for="site_email" class="block text-sm font-medium text-gray-700">Correo de Contacto</label>
                    <input type="email" id="site_email" name="site_email" class="mt-1 p-2 w-full border border-gray-300 rounded-md" value="{{ old('site_email') }}">
                </div>
                <div class="mb-4">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded-md">Guardar Configuraciones</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
