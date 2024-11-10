<!-- resources/views/contact.blade.php -->

<x-app-layout>
    <div class="min-h-screen bg-gradient-to-br from-blue-500 to-purple-600 bg-opacity-50 text-white px-4 sm:px-6 lg:px-8">
        <div class="container mx-auto mt-10">
            <!-- Caja con fondo translúcido -->
            <div class="bg-gradient-to-r from-blue-400 to-purple-500 bg-opacity-60 text-white p-8 rounded-lg shadow-lg backdrop-blur-lg">
                <h1 class="text-center text-4xl font-extrabold mb-6">Contáctanos</h1>
                <p class="text-center text-lg mb-6">Puedes contactarnos por los siguientes medios:</p>
                <ul class="space-y-4 text-center">
                    <li class="flex justify-center items-center">
                        <span class="font-semibold">Correo electrónico:</span>
                        <span class="ml-2 text-white/80">alertasmart@gmail.com</span>
                    </li>
                    <li class="flex flex-col justify-center items-center">
                        <span class="font-semibold">Líneas telefónicas:</span>
                        <ul class="space-y-2 mt-2">
                            <li class="text-white/80">Celular: xxx-xxx-xxxx</li>
                            <li class="text-white/80">Teléfono fijo: 601-xxxxxxx</li>
                            <li class="text-white/80">WhatsApp: xxx-xxx-xxxx</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>
