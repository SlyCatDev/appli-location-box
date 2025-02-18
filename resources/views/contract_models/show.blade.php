<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Affichage du Modèle de Contrat
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <a href="{{ route('contract_models.index') }}"
               class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Retour à la liste des modèles
            </a>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden p-6">
            <div class="contract-content prose dark:prose-invert">
                {!! $contractModel->content !!}
            </div>
        </div>
    </div>
</x-app-layout>
