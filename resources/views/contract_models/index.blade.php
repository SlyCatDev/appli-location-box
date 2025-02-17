<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Liste de Modèles de Contrats
        </h2>
    </x-slot>

    <div class="container">
        <a href="{{ route('contract_models.create') }}">Créer un nouveau modèle</a>
    
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contractModels as $contractModel)
                <tr>
                    <td>{{ $contractModel->id }}</td>
                    <td>{{ $contractModel->name }}</td>
                    <td>
                        <a href="{{ route('contract_models.show', $contractModel->id) }}">Afficher</a>
                        <a href="{{ route('contract_models.edit', $contractModel->id) }}">Modifier</a>
                        <form action="{{ route('contract_models.destroy', $contractModel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce modèle ?');">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>