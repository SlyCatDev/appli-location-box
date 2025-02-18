<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Détails de la Box
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto mt-8 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        
        {{-- Bouton de retour --}}
        <div class="mb-4">
            <a href="{{ route('boxes.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Retour à la liste des boxes
            </a>
        </div>

        {{-- Tableau d'affichage des détails de la box --}}
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-100 dark:bg-gray-700">
                    <tr>
                        <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-300">ID Box</th>
                        <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-300">Nom</th>
                        <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-300">Contenu</th>
                        <th class="px-6 py-3 text-left text-gray-700 dark:text-gray-300">Prix/mois</th>
                    </tr>
                </thead>
                <tbody class="bg-white dark:bg-gray-800">
                    <tr class="border-t border-gray-300 dark:border-gray-700">
                        <td class="px-6 py-4">{{ $box->id }}</td>
                        <td class="px-6 py-4">{{ $box->name }}</td>
                        <td class="px-6 py-4">{{ $box->contenu }}</td>
                        <td class="px-6 py-4">{{ $box->price }} €</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>