<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier un contrat
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

    <form action="{{ route('contracts.update', $contract->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="date_start">Date de début de contrat</label>
            <input type="date" class="form-control" id="date_start" name="date_start" value="{{ old('date_start', $contract->date_start) }}" required>
        </div>
        <div class="form-group">
            <label for="date_end">Date de fin de contrat</label>
            <input type="date" class="form-control" id="date_end" name="date_end" value="{{ old('date_end', $contract->date_end) }}" required>
        </div>
        <div class="form-group">
            <label for="monthly_price">Montant par mois</label>
            <input type="number"  class="form-control" id="monthly_price" name="monthly_price" value="{{ old('date_start', $contract->monthly_price) }}" required>
        </div>
        <div class="form-group">
            <label for="box_id">Nom du Box</label>
            <select type="number" class="form-control" id="box_id" name="box_id" required>
                @foreach ($boxes as $box)
                    <option value="{{ $box->id }}" {{ $box->id == $contract->box_id ? 'selected' : '' }}>{{ $box->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="tenant_id">Nom du locataire</label>
            <select type="number" class="form-control" id="tenant_id" name="tenant_id" required>
                @foreach ($tenants as $tenant)
                    <option value="{{ $tenant->id }}" {{ $tenant->id == $contract->tenant_id ? 'selected' : '' }}>{{ $tenant->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="user_id">Nom de l'utilisateur</label>
            <select type="number" class="form-control" id="user_id" name="user_id" required>
                @foreach ($users as $user)
                    <option value="{{ $user->id }}" {{ $user->id == $contract->user_id ? 'selected' : '' }}>{{ $user->name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier le Contrat</button>
    </form>
</div>
</x-app-layout>