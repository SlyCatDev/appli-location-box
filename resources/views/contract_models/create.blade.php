<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un nouveau Modèle de Contrat
        </h2>
    </x-slot>

   <!-- EditorJS Core -->
   <script src="https://cdn.jsdelivr.net/npm/@editorjs/editorjs@latest"></script>
   <!-- Plugin Header -->
   <script src="https://cdn.jsdelivr.net/npm/@editorjs/header@latest"></script>
   <!-- Plugin Table -->
   <script src="https://cdn.jsdelivr.net/npm/@editorjs/table@latest"></script>

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

    <div class="container">
        <form action="{{ route('contract_models.store') }}" method="POST" id="editor-form">
            @csrf
            <div class="form-group">
                <label for="name">Nom du modèle</label>
                <input type="text" name="name" id="name" required>
            </div>
    
            <!-- Conteneur pour Editor.js -->
            <div id="editorjs"></div>
    
            <!-- Champ caché pour le JSON généré par Editor.js -->
            <input type="hidden" name="content" id="content">
    
            <button type="submit">Créer le modèle</button>
        </form>
    </div>

<script>
    // Initialisation de l'éditeur
    const editor = new EditorJS({
        holder: 'editorjs',
        placeholder: 'Commence à rédiger ton contenu ici...',
        tools: {
            header: {
                class: Header,
                inlineToolbar: ['link'],
                config: {
                    placeholder: 'Entrez un titre',
                    levels: [1, 2, 3, 4],
                    defaultLevel: 2
                }
            },
            table: {
                class: Table,
                inlineToolbar: true,
                config: {
                    rows: 2,
                    cols: 3
                }
            }
        },
        // Exemple de données initiales
        data: {
            blocks: [
                {
                    type: 'header',
                    data: {
                        text: 'Bienvenue sur Editor.js !',
                        level: 2
                    }
                },
                {
                    type: 'paragraph',
                    data: {
                        text: 'Cliquez sur le bouton "Sauvegarder" pour voir le JSON généré par l\'éditeur.'
                    }
                }
            ]
        }
    });

    // Sauvegarde des données de l'éditeur dans le textarea caché
    document.getElementById('saveButton').addEventListener('click', async () => {
        try {
            const outputData = await editor.save();
            document.getElementById('editorData').value = JSON.stringify(outputData.blocks);
            console.log('Données sauvegardées : ', outputData);
            alert("Contenu sauvegardé ! Consultez la console pour plus de détails.");
        } catch (error) {
            console.error('Erreur lors de la sauvegarde : ', error);
        }
    });
</script>

</x-app-layout>