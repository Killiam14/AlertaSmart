<!-- resources/views/admin/manage-users.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar -->
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
        <!-- Título -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Gestionar Usuarios</h2>
            <p class="text-gray-600">Aquí puedes ver y gestionar todos los usuarios registrados.</p>
        </div>

        <!-- Tabla de usuarios -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
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
                                <a href="#" class="text-blue-600 hover:underline">Editar</a>
                                <!-- Aquí puedes agregar más acciones como eliminar -->
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>