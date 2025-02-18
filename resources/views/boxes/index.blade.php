<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des boxes') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Bouton de création -->
        <div class="mb-4 flex justify-end">
            <a href="{{ route('boxes.create') }}" 
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md 
                hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                + Créer une box
            </a>
        </div>

        <!-- Tableau -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">ID Box</th>
                        <th class="px-4 py-3 text-left">Nom de la Box</th>
                        <th class="px-4 py-3 text-left">Contenu</th>
                        <th class="px-4 py-3 text-left">Prix/mois (€)</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-300">
                    @foreach ($boxes as $box)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $box->id }}</td>
                            <td class="px-4 py-3">{{ $box->name }}</td>
                            <td class="px-4 py-3">{{ $box->contenu }}</td>
                            <td class="px-4 py-3">{{ number_format($box->price, 2) }} €</td>
                            <td class="px-4 py-3 flex items-center justify-center space-x-2">
                                <a href="{{ route('boxes.show', $box->id) }}" 
                                    class="px-3 py-1 bg-green-600 text-white text-sm rounded-lg 
                                    hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                                    Voir
                                </a>
                                <a href="{{ route('boxes.edit', $box->id) }}" 
                                    class="px-3 py-1 bg-yellow-500 text-black text-sm rounded-lg 
                                    hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                    Éditer
                                </a>
                                <form action="{{ route('boxes.destroy', $box->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg 
                                        hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette box ?');">
                                        Supprimer
                                    </button>
                                </form>
                            </td>                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>