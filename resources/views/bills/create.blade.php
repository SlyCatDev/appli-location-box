<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer une facture
        </h2>
    </x-slot>

    <div class="container">
        <a href="{{ route('bills.index') }}">Retour à la liste des factures</a>
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
                <label for="paiement_montant">Montant du paiement</label>
                <input type="number" name="paiement_montant" id="paiement_montant" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="payment_date">Date de paiement</label>
                <input type="date" name="payment_date" id="payment_date" class="form-control" required>
            </div>

            {{-- <div>
                <label for="period_number">Période de paiement</label>
                <input type="number" name="period_number" id="period_number" class="form-control" required>
            </div> --}}

            <button type="submit" class="btn btn-primary">Générer les factures</button>
        </form>
    </div>
    
</x-app-layout>