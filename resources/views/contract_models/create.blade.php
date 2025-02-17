<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un nouveau Modèle de Contrat
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <div class="container">
        <form action="{{ route('contract_models.store') }}" method="POST" id="editor-form">
            @csrf
            <div class="form-group">
                <label for="name">Nom du modèle</label>
                <input type="text" name="name" id="name" required>
                @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- Create the editor container -->
            <div id="editor"></div>
    
            <!-- Champ caché pour le JSON généré par l'éditeur-->
            <input type="hidden" name="content" id="content">

            @error('content')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
    
            <button type="submit">Créer le modèle</button>
        </form>
    </div>

    <!-- Include the Quill library -->
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
    const quill = new Quill('#editor', {
        theme: 'snow'
    });
        document.getElementById('editor-form').addEventListener('submit', function (e) {
                const content = document.getElementById('content');
                content.value = quill.root.innerHTML;
            });
    </script>
</x-app-layout>