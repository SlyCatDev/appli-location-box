<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer une facture
        </h2>
    </x-slot>

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('bills.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="paiement_montant">Montant du paiement:</label>
            <input type="text" class="form-control" id="paiement_montant" name="paiement_montant" required>
        </div>
        <div class="form-group">
            <label for="payment_date">Date de paiement:</label>
            <input type="date" class="form-control" id="payment_date" name="payment_date" required>
        </div>
        <div class="form-group">
            <label for="period_number">Période de paiement:</label>
            <input type="number" class="form-control" id="period_number" name="period_number" required>
        </div>
        <div class="form-group">
            <label for="contract_id">Numéro de contrat</label>
            <select class="form-control" id="contract_id" name="contract_id" required>
                @foreach($contracts as $contract)
                    <option value="{{ $contract->id }}">{{ $contract->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
</div>
</x-app-layout>