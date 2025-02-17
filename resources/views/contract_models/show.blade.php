<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Affichage du Modèle de Contrat
        </h2>
    </x-slot>

{{-- @extends('layouts.app') --}}

{{-- @section('content') --}}

<div class="container">
    <div class="contract-content">
        {!! $content !!}
    </div>
    <a href="{{ route('contract_models.index') }}">Retour à la liste</a>
</div>


{{-- @endsection --}}
