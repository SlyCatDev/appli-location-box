<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste de Modèles de Contrats
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('contract_models.create') }}"
           class="mb-4 inline-block bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Créer un nouveau modèle
        </a>

        <!-- Tableau -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">ID</th>
                        <th class="px-4 py-3 text-left">Nom du modèle</th>
                        <th class="px-4 py-3 text-left">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-300">
                    @foreach ($contractModels as $contractModel)
                        <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-700">
                            <td class="px-4 py-3">{{ $contractModel->id }}</td>
                            <td class="px-4 py-3">{{ $contractModel->name }}</td>
                            <td class="px-4 py-3 flex items-center justify-center space-x-2">
                                <a href="{{ route('contract_models.show', $contractModel->id) }}"
                                   class="px-3 py-1 bg-green-600 text-white text-sm rounded-lg hover:bg-green-700 focus:outline-none focus:ring focus:ring-green-300">
                                    Afficher
                                </a>
                                <a href="{{ route('contract_models.edit', $contractModel->id) }}"
                                   class="px-3 py-1 bg-yellow-500 text-black text-sm rounded-lg hover:bg-yellow-600 focus:outline-none focus:ring focus:ring-yellow-300">
                                    Modifier
                                </a>
                                <form action="{{ route('contract_models.destroy', $contractModel->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="px-3 py-1 bg-red-600 text-white text-sm rounded-lg hover:bg-red-700 focus:outline-none focus:ring focus:ring-red-300"
                                        onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle ?');">
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
