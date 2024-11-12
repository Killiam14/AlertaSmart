<!-- resources/views/contact.blade.php -->
<x-app-layout>
    <div class="container mx-auto mt-16 px-6 sm:px-8 lg:px-16">
        <div class="bg-gradient-to-r from-indigo-900 via-purple-800 to-blue-900 text-white p-8 rounded-lg shadow-lg max-w-4xl mx-auto">
            <h1 class="text-center text-5xl font-extrabold mb-6 animate__animated animate__fadeIn">Contáctanos</h1>
            <p class="text-center text-xl mb-6 animate__animated animate__fadeIn animate__delay-1s">Estamos aquí para ayudarte, puedes contactarnos por los siguientes medios:</p>
            <ul class="space-y-4 text-center">
                <li class="flex justify-center items-center animate__animated animate__fadeIn animate__delay-2s">
                    <span class="font-semibold text-lg">Correo electrónico:</span>
                    <span class="ml-2 text-white/80 hover:text-white transition duration-300">alertasmart@gmail.com</span>
                </li>
                <li class="flex flex-col justify-center items-center animate__animated animate__fadeIn animate__delay-3s">
                    <span class="font-semibold text-lg">Líneas telefónicas:</span>
                    <ul class="space-y-2 mt-2">
                        <li class="text-white/80 hover:text-white transition duration-300">Celular: xxx-xxx-xxxx</li>
                        <li class="text-white/80 hover:text-white transition duration-300">Teléfono fijo: 601-xxxxxxx</li>
                        <li class="text-white/80 hover:text-white transition duration-300">WhatsApp: xxx-xxx-xxxx</li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</x-app-layout>
