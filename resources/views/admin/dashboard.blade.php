<!-- resources/views/admin/dashboard.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <!-- Estilos, puedes incluir Bootstrap o tus propios estilos -->
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
                <a href="{{ route('dashboard') }}" class="text-white hover:text-gray-400">Dashboard</a>

                <!-- Formulario para cerrar sesión -->
                <form method="POST" action="{{ route('logout') }}" class="inline-block ml-4">
                    @csrf
                    <button type="submit" class="text-white hover:text-gray-400">Cerrar sesión</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mx-auto mt-8 p-4">
        <!-- Mensaje de bienvenida -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Bienvenido, {{ Auth::user()->name }}</h2>
            <p class="text-gray-600">Esta es la sección de administración exclusiva para ti.</p>
        </div>

        <!-- Información o paneles para administradores -->
        <div class="mt-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Gestionar Usuarios</h3>
                <p class="text-gray-600">Administra los usuarios de la plataforma.</p>
                <a href="{{ route('admin.users') }}" class="text-blue-600 hover:underline">Ver usuarios</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Gestionar Reportes</h3>
                <p class="text-gray-600">Revisa los reportes generados por los usuarios.</p>
                <a href="{{ route('admin.reports') }}" class="text-blue-600 hover:underline">Ver reportes</a>
            </div>
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h3 class="text-xl font-semibold">Configuraciones</h3>
                <p class="text-gray-600">Configura las opciones de la aplicación.</p>
                <a href="#" class="text-blue-600 hover:underline">Ver configuraciones</a>
            </div>
        </div>
    </div>

</body>
</html>
