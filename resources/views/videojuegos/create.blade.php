<x-app-layout>
    <div class="w-1/2 mx-auto">
        <form method="POST" action="{{ route('videojuegos.store') }}">
            @csrf

            <!-- titulo -->
            <div>
                <x-input-label for="titulo" :value="'Titulo del videojuego'" />
                <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo" :value="old('titulo')"
                    required autofocus autocomplete="titulo" />
                <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
            </div>
            <!-- anyo -->
            <div>
                <x-input-label for="anyo" :value="'Año del videojuego'" />
                <x-text-input id="anyo" class="block mt-1 w-full" type="text" name="anyo" :value="old('anyo')"
                    required autofocus autocomplete="anyo" />
                <x-input-error :messages="$errors->get('anyo')" class="mt-2" />
            </div>
            <!-- Desarrolladora -->
            <div>
                <x-input-label for="desarrolladora_id" :value="'Desarrolladora del Juego'" />
                <select id="desarrolladora_id"
                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                    name="desarrolladora_id" required>
                    @forelse ($desarrolladoras as $desarrolladora)
                    <option value="{{ $desarrolladora->id }}"
                        {{ old('desarrolladora_id') == $desarrolladora->id ? 'selected' : '' }}>
                        {{ $desarrolladora->nombre }}
                    </option>

                    @empty
                        No existen desarrolladoras
                    @endforelse
                </select>
                <x-input-error :messages="$errors->get('desarrolladora_id')" class="mt-2" />

            </div>
            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('videojuegos.index') }}">
                    <x-secondary-button class="ms-4">
                        Volver
                        </x-primary-button>
                </a>
                <x-primary-button class="ms-4">
                    Insertar
                </x-primary-button>
            </div>
        </form>
    </div>
</x-app-layout>
