<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Gestion des boxes') }}
        </h2>
    </x-slot>

    <a href="{{ route('boxes.create') }}">Créer une box</a>
        <table>
            <thead>
                <tr>
                    <th>ID Box</th>
                    <th>Nom de la Box</th>
                    <th>Contenu</th>
                    <th>Prix</th>
                    <th>Créateur</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($boxes as $box)
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->contenu }}</td>
                    <td>{{ $box->price }}</td>
                    <td>{{ $box->owner ? $box->owner->name : 'Owner not found' }}</td>
                    <td>
                        <a href="{{ route('boxes.show', $box->id) }}">Voir</a>
                        <a href="{{ route('boxes.edit', $box->id) }}">Éditer</a>
                        <form action="{{ route('boxes.destroy', $box->id) }}" method="POST" style="display:inline;">
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