<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer une box
        </h2>
    </x-slot>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body">
                        <form action="{{ route('boxes.store') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label for="name">Nom : </label>
                            <input type="text" name="name" class="form-control" required autofocus>
                        </div>
                        <div class="form-group">
                            <label for="contenu">Contenu :</label>
                            <textarea name="contenu" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="contenu">Prix :</label>
                            <textarea name="price" class="form-control"></textarea>
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-success">Ajouter</button>
                            <a href="{{ route('boxes.index') }}" class="btn btn-secondary">Retour</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>