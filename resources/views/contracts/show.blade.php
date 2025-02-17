<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Détail du contrat') }}
        </h2>
    </x-slot>
<div class="container">
    <div class="card">
        <div class="card-header">
            Contrat #{{ $contract->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">Nom du locataire: {{ $contract->tenant->name }}</h5>
            <p class="card-text">Date de Début: {{ $contract->date_start }}</p>
            <p class="card-text">Date de Fin: {{ $contract->date_end }}</p>
            <p class="card-text">Montant par mois: {{ $contract->monthly_price }} €</p>
            <a href="{{ route('contracts.index') }}" class="btn btn-primary">Retour à la liste</a>
        </div>
    </div>
</div>
</x-app-layout>