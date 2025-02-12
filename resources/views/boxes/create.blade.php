<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un box
        </h2>
    </x-slot>

    <form action="{{ route('boxes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom : </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Ajouter</button>
    </form>
</x-app-layout>