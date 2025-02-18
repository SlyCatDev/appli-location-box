<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Éditer un box') }}
        </h2>
    </x-slot>
    
    <div class="max-w-2xl mx-auto mt-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">

            <div class="mb-4">
                <a href="{{ route('boxes.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                    ← Retour à la liste des boxes
                </a>
            </div>
            
            <form action="{{ route('boxes.update', $box->id) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')
    
                {{-- Nom --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom :</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $box->name) }}" 
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm 
                        focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900" 
                        required autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                {{-- Contenu --}}
                <div>
                    <label for="contenu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contenu :</label>
                    <textarea id="contenu" name="contenu" rows="3"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm 
                        focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900"
                        required>{{ old('contenu', $box->contenu) }}</textarea>
                    @error('contenu')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                {{-- Prix/mois --}}
                <div>
                    <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix/mois :</label>
                    <input id="price" type="number" step="any" name="price" value="{{ old('price', $box->price) }}"
                        class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 rounded-lg shadow-sm 
                        focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white bg-gray-50 dark:bg-gray-900"
                        required>
                    @error('price')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
    
                {{-- Boutons --}}
                <div class="flex justify-between">
                    <a href="{{ route('boxes.index') }}" 
                        class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 
                        focus:outline-none focus:ring-2 focus:ring-gray-400">
                        Retour
                    </a>
                    <button type="submit" 
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 
                        focus:outline-none focus:ring-2 focus:ring-blue-400">
                        Appliquer la modification
                    </button>
                </div>
            </form>
        </div>
</x-app-layout>