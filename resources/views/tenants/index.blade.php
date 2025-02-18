<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des locataires') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Bouton de création -->
        <div class="mb-4 flex justify-end">
            <a href="{{ route('tenants.create') }}"
                class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md
                hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                + Créer un locataire
            </a>
        </div>

        <!-- Tableau -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">Nom du locataire</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Téléphone</th>
                        <th class="px-4 py-3 text-left">Adresse</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-300">
                    @foreach ($tenants as $tenant)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $tenant->name }}</td>
                            <td class="px-4 py-3">{{ $tenant->email }}</td>
                            <td class="px-4 py-3">{{ $tenant->phone }}</td>
                            <td class="px-4 py-3">{{ $tenant->address }}</td>
                            <td class="px-4 py-3 flex items-center justify-center space-x-2">
                                <a href="{{ route('tenants.show', $tenant->id) }}"
                                    class="px-3 py-1 bg-green-600 text-white text-sm rounded-lg
                                    hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                                    Voir
                                </a>
                                <a href="{{ route('tenants.edit', $tenant->id) }}"
                                    class="px-3 py-1 bg-yellow-500 text-black text-sm rounded-lg
                                    hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                    Éditer
                                </a>
                                <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg
                                        hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce locataire ?');">
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
