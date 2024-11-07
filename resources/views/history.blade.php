<!-- resources/views/history.blade.php -->

<x-app-layout>
    <div class="container mx-auto mt-10">
        <h1 class="text-center text-3xl font-bold mb-6">Historial de Reportes</h1>

        @if($reports->isEmpty())
            <p class="text-center">No has realizado ningún reporte.</p>
        @else
            <table class="min-w-full border-collapse">
                <thead>
                    <tr>
                        <th class="border px-4 py-2">Descripción</th>
                        <th class="border px-4 py-2">Ubicación</th>
                        <th class="border px-4 py-2">Tipo de Fallo</th>
                        <th class="border px-4 py-2">Empresa</th>
                        <th class="border px-4 py-2">Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($reports as $report)
                        <tr>
                            <td class="border px-4 py-2">{{ $report->description }}</td>
                            <td class="border px-4 py-2">{{ $report->location }}</td>
                            <td class="border px-4 py-2">{{ $report->fault_type }}</td>
                            <td class="border px-4 py-2">{{ $report->company }}</td>
                            <td class="border px-4 py-2">{{ $report->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
