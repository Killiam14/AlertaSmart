<!-- resources/views/admin/manage-reports.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Reportes</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- Navbar o Barra de navegación -->
    <nav class="bg-gray-800 p-4 text-white">
        <div class="container mx-auto flex justify-between">
            <div>
                <h1 class="text-xl font-semibold">Gestionar Reportes</h1>
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
        <!-- Tabla de Reportes -->
        <div class="bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold text-gray-800">Listado de Reportes</h2>

            <table class="min-w-full mt-6 table-auto">
                <thead>
                    <tr>
                        <th class="px-4 py-2 border">ID</th>
                        <th class="px-4 py-2 border">Usuario</th>
                        <th class="px-4 py-2 border">Título</th>
                        <th class="px-4 py-2 border">Fecha de Creación</th>
                        <th class="px-4 py-2 border">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($reports as $report)
                    <tr>
                        <td class="px-4 py-2 border">{{ $report->id }}</td>
                        <td class="px-4 py-2 border">
                        {{ $report->user ? $report->user->name : 'Usuario eliminado' }}
                        </td> <!-- Si tienes relación con User -->
                        <td class="px-4 py-2 border">{{ $report->title }}</td>
                        <td class="px-4 py-2 border">{{ $report->created_at->format('d/m/Y') }}</td>
                        <td class="px-4 py-2 border">
                            <!-- Puedes agregar botones para ver, editar, eliminar reportes -->
                            <a href="{{ route('admin.reports.view', $report->id) }}" class="text-blue-600 hover:underline">Ver Detalles</a>

                            <!-- Formulario Eliminar -->
                            <form action="{{ route('admin.reports.delete', $report->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
