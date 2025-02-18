<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des factures') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div class="mb-4">
            <a href="{{ route('bills.create') }}" 
               class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                Créer une facture
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            <table class="min-w-full border-collapse border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-200 dark:bg-gray-700">
                    <tr>
                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Montant du paiement</th>
                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Date de paiement</th>
                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Période de paiement</th>
                        <th class="px-4 py-2 border border-gray-300 dark:border-gray-600">Numéro de contrat</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bills as $bill)
                    <tr class="odd:bg-gray-100 even:bg-white dark:odd:bg-gray-700 dark:even:bg-gray-800">
                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $bill->paiement_montant }}</td>
                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $bill->payment_date }}</td>
                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $bill->period_number }}</td>
                        <td class="px-4 py-2 border border-gray-300 dark:border-gray-600">{{ $bill->contract->id }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</x-app-layout>