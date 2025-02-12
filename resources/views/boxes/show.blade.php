<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Box') }}
        </h2>
    </x-slot>

    <a href="{{ route('boxes.index') }}">Revenir à la liste des boxes</a>
        <table>
            <thead>
                <tr>
                    <th>ID Box</th>
                    <th>Nom de la Box</th>
                    <th>Contenu</th>
                    <th>Créateur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $box->id }}</td>
                    <td>{{ $box->name }}</td>
                    <td>{{ $box->contenu }}</td>
                    <td>{{ $box->user->name}}</td>             
                </tr>
            </tbody>
        </table>
    </body>
</x-app-layout>