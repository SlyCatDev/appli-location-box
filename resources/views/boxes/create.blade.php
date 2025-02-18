<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un box') }}
        </h2>
    </x-slot>
    
    <div class="max-w-2xl mx-auto mt-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">

        <div class="mb-4">
            <a href="{{ route('boxes.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Retour à la liste des boxes
            </a>
        </div>

        <!-- Affichage des erreurs -->
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 dark:bg-red-900 text-red-700 dark:text-red-300 rounded-lg">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Formulaire -->
        <form action="{{ route('boxes.store') }}" method="POST" class="space-y-4">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom :</label>
                <input type="text" name="name" id="name"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white 
                    bg-gray-50 dark:bg-gray-900" required autofocus>
            </div>

            <div>
                <label for="contenu" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Contenu :</label>
                <textarea name="contenu" id="contenu" rows="3"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white 
                    bg-gray-50 dark:bg-gray-900"></textarea>
            </div>

            <div>
                <label for="price" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Prix/mois :</label>
                <input type="number" name="price" id="price"
                    class="mt-1 block w-full px-4 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 text-gray-900 dark:text-white 
                    bg-gray-50 dark:bg-gray-900" required>
            </div>

                <button type="submit" 
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 
                    focus:outline-none focus:ring-2 focus:ring-green-400">
                    Ajouter
                </button>
            </div>
        </form>
    </div>
</x-app-layout>    