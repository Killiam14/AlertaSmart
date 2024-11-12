<!-- resources/views/admin/edit-user.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuario</title>
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
                <a href="{{ route('admin.dashboard') }}" class="text-white hover:text-gray-400">Panel de Administración</a>

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
            <h2 class="text-2xl font-bold text-gray-800">Editar Usuario</h2>
            <p class="text-gray-600">Aquí puedes editar la información del usuario.</p>
        </div>

        <!-- Formulario de edición de usuario -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Campo de Nombre -->
                <div class="mb-4">
                    <label for="name" class="block text-gray-700">Nombre</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}" class="w-full p-3 border border-gray-300 rounded-md">
                </div>

                <!-- Campo de Correo -->
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Correo</label>
                    <input type="email" name="email" id="email" value="{{ old('email', $user->email) }}" class="w-full p-3 border border-gray-300 rounded-md">
                </div>

                <!-- Campo de Rol -->
                <div class="mb-4">
                    <label for="role" class="block text-gray-700">Rol</label>
                    <select name="role" id="role" class="w-full p-3 border border-gray-300 rounded-md">
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Administrador</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>Usuario</option>
                    </select>
                </div>

                <!-- Botón de guardar -->
                <div class="mb-4">
                    <button type="submit" class="px-6 py-3 bg-blue-500 text-white font-bold rounded-md">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
