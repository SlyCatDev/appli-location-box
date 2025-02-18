<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détail du contrat') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        <a href="{{ route('contracts.index') }}"
                   class="mt-4 inline-block bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Retour à la liste
                </a>
                
        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <div class="border-b px-4 py-5 sm:px-6">
                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                    Contrat #{{ $contract->id }}
                </h3>
            </div>
            <div class="px-4 py-5 sm:p-6">
                <h5 class="text-lg font-semibold text-gray-800 dark:text-gray-200">Nom du locataire: {{ $contract->tenant->name }}</h5>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Date de Début: {{ $contract->date_start }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Date de Fin: {{ $contract->date_end }}</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Montant par mois: {{ $contract->monthly_price }} €</p>
                <p class="mt-2 text-gray-700 dark:text-gray-300">Nom de la box: {{ $contract->box->name }}</p>

                <div id="editor" class="mt-4 a4-sheet bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md">
                    @if($contract->contract_model_id)
                        {!! $replacedContent !!}
                    @else
                        <p>Aucun contenu de modèle disponible.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>
    <script>
        const quill = new Quill('#editor', {
            readOnly: true,
            modules: {
                toolbar: null
            },
            theme: 'snow'
        });
    </script>
</x-app-layout>
