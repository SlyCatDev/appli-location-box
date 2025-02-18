<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des contrats') }}
        </h2>
    </x-slot>

    <a href="{{ route('contracts.create') }}">Créer un contrat</a>
        <table>
            <thead>
                <tr>
                    <th>Numéro de contrat</th>
                    <th>Date de début de contrat</th>
                    <th>Date de fin de contrat</th>
                    <th>Prix par mois</th>
                    <th>Nom du box</th>
                    <th>Nom du locataire</th>
                    <th>Nom du propriétaire</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contracts as $contract)
                <tr>
                    <td>{{ $contract->id }}</td>
                    <td>{{ $contract->date_start }}</td>
                    <td>{{ $contract->date_end }}</td>
                    <td>{{ $contract->monthly_price }}</td>
                    <td>{{ $contract->box->name }}</td>
                    <td>{{ $contract->tenant->name }}</td>
                    <td>{{ $contract->user->name }}</td>
                    <td>
                        <a href="{{ route('contracts.show', $contract->id) }}">Voir</a>
                        <a href="{{ route('contracts.edit', $contract->id) }}">Modifier</a>
                        <form action="{{ route('contracts.destroy', $contract->id) }}" method="POST" style="display:inline;">
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