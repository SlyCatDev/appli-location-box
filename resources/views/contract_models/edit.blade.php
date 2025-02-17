<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le Modèle de Contrat
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

<div class="container">
    <form action="{{ route('contract_models.update', $contractModel->id) }}" method="POST" id="editor-form">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nom du modèle</label>
            <input type="text" name="name" id="name" required>
        </div>

        <!-- Conteneur pour Editor.js -->
        <div id="editor"></div>

        <!-- Champ caché pour le JSON généré par Editor.js -->
        <input type="hidden" name="content" id="content">
    
        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>

<!-- Include the Quill library -->
<script src="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  const quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>

</x-app-layout>
    

