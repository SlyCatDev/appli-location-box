<!-- resources/views/contract_models/edit.blade.php -->
{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Modifier le Modèle de Contrat
        </h2>
    </x-slot>

<div class="container">
    <form action="{{ route('contract_models.update', $contractModel->id) }}" method="POST" id="editor-form">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nom du modèle</label>
            <input type="text" name="name" id="name" value="{{ old('name', $contractModel->name) }}" required>
        </div>

        <!-- Conteneur pour Editor.js -->
        <div id="editor"></div>

        <!-- Champ caché pour le JSON généré par Editor.js.
             On peut y précharger le contenu déjà existant -->
        <input type="hidden" name="content" id="content" value="{{ old('content', $contractModel->content) }}">

        <button type="submit">Enregistrer les modifications</button>
    </form>
</div>
    <script src="/js/codex-editor.js"></script>
<x-app-layout>
{{-- @endsection --}}
    

