<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un nouveau Modèle de Contrat
        </h2>
    </x-slot>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <form action="{{ route('contract_models.store') }}" method="POST" id="editor-form"
              class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nom du modèle</label>
                <input type="text" name="name" id="name" required
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror">
                @error('name')
                    <div class="text-red-500 text-xs italic">{{ $message }}</div>
                @enderror
            </div>

            <!-- Create the editor container -->
            <div id="editor" class="mb-4 bg-white dark:bg-gray-800 p-4 rounded-lg shadow-md"></div>

            <!-- Champ caché pour le JSON généré par l'éditeur-->
            <input type="hidden" name="content" id="content">

            @error('content')
                <div class="text-red-500 text-xs italic">{{ $message }}</div>
            @enderror

            <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Créer le modèle
            </button>
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