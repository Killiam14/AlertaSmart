<x-app-layout>
    <div class="container mx-auto mt-12 px-6 sm:px-8 lg:px-16">
        <!-- Título Principal -->
        <h1 class="text-center text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-green-400 to-blue-500 mb-10">
            Historial de Reportes
        </h1>

        <!-- Mensaje de Sin Reportes -->
        @if($reports->isEmpty())
            <div class="text-center p-6 bg-yellow-100 border-l-4 border-yellow-500 rounded-lg shadow-lg mb-8">
                <p class="text-lg text-yellow-700">Aún no has realizado ningún reporte.</p>
            </div>
        @else
            <!-- Tabla de Reportes -->
            <div class="overflow-x-auto bg-gradient-to-r from-teal-50 via-teal-100 to-teal-200 shadow-xl rounded-lg">
                <table class="min-w-full table-auto bg-white border-collapse">
                    <thead>
                        <tr class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-sm uppercase">
                            <th class="px-6 py-4 font-semibold">Descripción</th>
                            <th class="px-6 py-4 font-semibold">Ubicación</th>
                            <th class="px-6 py-4 font-semibold">Tipo de Fallo</th>
                            <th class="px-6 py-4 font-semibold">Empresa</th>
                            <th class="px-6 py-4 font-semibold">Fecha</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-800 text-sm">
                        @foreach($reports as $report)
                            <tr class="transition duration-200 ease-in-out hover:bg-gray-100 hover:shadow-md">
                                <td class="px-6 py-4 border-b">{{ $report->description }}</td>
                                <td class="px-6 py-4 border-b">{{ $report->location }}</td>
                                <td class="px-6 py-4 border-b">{{ $report->fault_type }}</td>
                                <td class="px-6 py-4 border-b">{{ $report->company }}</td>
                                <td class="px-6 py-4 border-b">{{ $report->created_at->format('d-m-Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-app-layout>
