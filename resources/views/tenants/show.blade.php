<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détail du locataire') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <a href="{{ route('tenants.index') }}"
           class="mb-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Revenir à la liste des locataires
        </a>

        <!-- Tableau -->
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <table class="min-w-full border-collapse">
                <thead class="bg-gray-50 dark:bg-gray-700 text-gray-600 dark:text-gray-300">
                    <tr>
                        <th class="px-4 py-3 text-left">Nom du locataire</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Téléphone</th>
                        <th class="px-4 py-3 text-left">Adresse</th>
                    </tr>
                </thead>
                <tbody class="text-gray-700 dark:text-gray-300">
                    <tr class="border-t hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3">{{ $tenant->name }}</td>
                        <td class="px-4 py-3">{{ $tenant->email }}</td>
                        <td class="px-4 py-3">{{ $tenant->phone }}</td>
                        <td class="px-4 py-3">{{ $tenant->address }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>
