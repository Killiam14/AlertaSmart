<!-- resources/views/admin/reports.blade.php -->

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
            <h2 class="text-2xl font-bold text-gray-800">Gestionar Reportes</h2>
            <p class="text-gray-600">Aquí puedes ver todos los reportes enviados por los usuarios.</p>
        </div>

        <!-- Tabla de Reportes -->
        <div class="mt-6 bg-white p-6 rounded-lg shadow-md">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-3 px-4 border-b">ID</th>
                        <th class="py-3 px-4 border-b">Usuario</th>
                        <th class="py-3 px-4 border-b">Reporte</th>
                        <th class="py-3 px-4 border-b">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Aquí irían los datos de los reportes, por ejemplo usando un bucle -->
                    @foreach ($reports as $report)
                        <tr>
                            <td class="py-3 px-4 border-b">{{ $report->id }}</td>
                            <td class="py-3 px-4 border-b">{{ $report->user->name }}</td>
                            <td class="py-3 px-4 border-b">{{ $report->description }}</td>
                            <td class="py-3 px-4 border-b">{{ $report->created_at }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</body>
</html>
