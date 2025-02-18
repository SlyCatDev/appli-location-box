<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer une facture') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">
        <!-- Bouton retour -->
        <div class="mb-4">
            <a href="{{ route('bills.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Retour à la liste des factures
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
        <form action="{{ route('bills.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="paiement_montant" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Montant du paiement
                </label>
                <input type="number" name="paiement_montant" id="paiement_montant" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 
                    dark:text-white"
                    required>
            </div>

            <div class="mb-4">
                <label for="payment_date" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Date de paiement
                </label>
                <input type="date" name="payment_date" id="payment_date" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 
                    dark:text-white"
                    required>
            </div>

            <div class="mb-4">
                <label for="period_number" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                    Période de paiement
                </label>
                <input type="number" name="period_number" id="period_number" 
                    class="mt-1 block w-full px-3 py-2 border border-gray-300 dark:border-gray-700 
                    rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-900 
                    dark:text-white"
                    required>
            </div>

            <div class="flex justify-end">
                <button type="submit" 
                    class="px-6 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md 
                    hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                    Générer les factures
                </button>
            </div>
        </form>
    </div>
</x-app-layout>