<x-app-layout>
    <div class="relative overflow-x-auto w-3/4 mx-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        Titulo
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Año
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Desarrolladora
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Distribuidora
                    </th>
                    <th scope="col" class="px-6 py-3" colspan="2">
                        Acción
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($videojuegos as $videojuego)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('videojuegos.show', $videojuego) }}">
                                {{ $videojuego->titulo }}
                            </a>
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('videojuegos.show', $videojuego) }}">
                                {{ $videojuego->anyo }}
                            </a>
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('videojuegos.show', $videojuego) }}">
                                {{ $videojuego->desarrolladora->nombre }}
                            </a>
                        </th>
                        <th scope="row"
                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a class="text-blue-500 blue" href="{{ route('videojuegos.show', $videojuego) }}">
                                {{ $videojuego->desarrolladora->distribuidora->nombre }}
                            </a>
                        </th>
                        <td class="px-6 py-4">

                            @if (Auth::user()->videojuegos->contains($videojuego))

                                <x-primary-button class="bg-red-500">
                                    Borrar
                                </x-primary-button>
                            @else
                                <x-primary-button class="bg-green-500">
                                    Añadir
                                </x-primary-button>
                            @endif
                            </a>
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</x-app-layout>
