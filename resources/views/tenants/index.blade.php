<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des locataires') }}
        </h2>
    </x-slot>

    <a href="{{ route('tenants.create') }}">Créer un locataire</a>
        <table>
            <thead>
                <tr>
                    <th>Nom du locataire</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tenants as $tenant)
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>{{ $tenant->phone }}</td>
                    <td>{{ $tenant->address }}</td>
                    <td>
                        <a href="{{ route('tenants.show', $tenant->id) }}">Voir</a>
                        <a href="{{ route('tenants.edit', $tenant->id) }}">Éditer</a>
                        <form action="{{ route('tenants.destroy', $tenant->id) }}" method="POST" style="display:inline;">
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