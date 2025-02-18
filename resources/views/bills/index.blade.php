<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des factures') }}
        </h2>
    </x-slot>

    <a href="{{ route('bills.create') }}">Créer une facture</a>
    <table>
        <thead>
            <tr>
                <th>Montant du paiement</th>
                <th>Date de paiement</th>
                <th>Délai de paiement</th>
                <th>Numéro de contrat</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bills as $bill)
            <tr>
                <td>{{ $bill->paiement_montant }}</td>
                <td>{{ $bill->payment_date }}</td>
                <td>{{ $bill->period_number }}</td>
                <td>{{ $bill->contract->id }}</td>
                <td>         
                    <form action="{{ route('bills.destroy', $bill->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</x-app-layout>