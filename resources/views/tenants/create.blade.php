<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Créer un nouveau locataire associé avec un contrat
        </h2>
    </x-slot>

{{-- @extends('layouts.app') --}}

{{-- @section('title', 'Create New Tenant') --}}

{{-- @section('content') --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">

                <div class="card-body">
                    <form action="{{ route('tenants.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label">Nom :</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" required>
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email :</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" required>
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Téléphone :</label>
                            <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone">
                            @error('phone')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="address" class="form-label">Addresse :</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="3"></textarea>
                            @error('address')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="bank_account" class="form-label">IBAN :</label>
                            <textarea class="form-control @error('bank_ account') is-invalid @enderror" id="bank_account" name="bank_account" rows="3"></textarea>
                            @error('bank_account')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-primary">Ajouter</button>
                            <a href="{{ route('tenants.index') }}" class="btn btn-secondary">Retour</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>
        