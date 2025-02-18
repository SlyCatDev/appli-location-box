<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un contrat
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

    <form action="{{ route('contracts.store') }}" method="POST">
        @csrf

        <select name="contractModel_id" required>
            <option value="">Sélectionner un modèle</option>
            @foreach ($contractModels as $model)
                <option value="{{ $model->id }}">{{ $model->name }}</option>
            @endforeach
        </select>

        <div class="form-group">
            <label for="date_start">Date de début de contrat</label>
            <input type="date" class="form-control" id="date_start" name="date_start" required>
        </div>
        <div class="form-group">
            <label for="date_end">Date de fin de contrat</label>
            <input type="date" class="form-control" id="date_end" name="date_end" required>
        </div>
        <div class="form-group">
            <label for="monthly_price">Prix/mois</label>
            <input type="number" class="form-control" id="monthly_price" name="monthly_price" required>
        </div>
        <div class="form-group">
            <label for="box_id">Nom de la Box</label>
            <select type="number" class="form-control" id="box_id" name="box_id" required>
                @foreach ($boxes as $box)
                    <option value="{{ $box->id }}">{{ $box->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tenant_id">Nom du locataire</label>
            <select type="number" class="form-control" id="tenant_id" name="tenant_id" required>
                @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->id }}">{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>
        
        <button type="submit" class="btn btn-primary">Créer un Contrat</button>
    </form>
</div>
</x-app-layout>