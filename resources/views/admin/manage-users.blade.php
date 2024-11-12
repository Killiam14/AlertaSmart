<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-green-50">

    <!-- Navbar -->
    <nav class="bg-green-600 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Panel de Administración</h1>
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

    <!-- Mensaje de éxito (si existe) -->
    @if(session('success'))
        <div id="successMessage" class="fixed bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="container mx-auto mt-8 p-4">
        <!-- Título -->
        <div class="bg-white p-6 rounded-lg shadow-md bg-opacity-75 border border-green-300">
            <h2 class="text-2xl font-bold text-gray-800">Gestionar Usuarios</h2>
            <p class="text-gray-600">Aquí puedes ver y gestionar todos los usuarios registrados.</p>
        </div>

        <!-- Tabla de usuarios -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md bg-opacity-75 border border-green-300">
            <table class="min-w-full table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 text-left">Nombre</th>
                        <th class="px-4 py-2 text-left">Correo</th>
                        <th class="px-4 py-2 text-left">Rol</th>
                        <th class="px-4 py-2 text-left">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr class="border-t">
                            <td class="px-4 py-2">{{ $user->name }}</td>
                            <td class="px-4 py-2">{{ $user->email }}</td>
                            <td class="px-4 py-2">{{ $user->role }}</td>
                            <td class="px-4 py-2">
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="text-green-600 hover:text-green-400">Editar</a>
                                
                                <!-- Formulario de eliminación -->
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-400">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Scripts -->
    <script>
        // Script para ocultar el mensaje de éxito después de 3 segundos
        @if(session('success'))
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 3000);
        @endif
    </script>
</body>
</html>
