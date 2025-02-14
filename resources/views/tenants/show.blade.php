<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Locataire') }}
        </h2>
    </x-slot>

    <a href="{{ route('tenants.index') }}">Revenir à la liste des locataires</a>
        <table>
            <thead>
                <tr>
                    <th>Nom du locataire</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Adresse</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $tenant->name }}</td>
                    <td>{{ $tenant->email }}</td>
                    <td>{{ $tenant->phone }}</td>
                    <td>{{ $tenant->address }}</td>         
                </tr>
            </tbody>
        </table>
    </body>
</x-app-layout>