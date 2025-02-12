<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Editer une box
        </h2>
    </x-slot>

    <form action="{{ route('boxes.update', $box->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom : </label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="contenu">Contenu :</label>
            <textarea name="contenu" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-success">Appliquer la modification</button>
    </form>
</x-app-layout>