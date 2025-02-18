<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Modifier un locataire') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">

        <div class="mb-4">
            <a href="{{ route('boxes.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Retour à la liste des locataires
            </a>
        </div>

        <form action="{{ route('tenants.update', $tenant->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                {{-- Nom --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nom</label>
                    <input id="name" type="text" name="name" value="{{ old('name', $tenant->name) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('name') @enderror" 
                        required autofocus>
                    @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Email</label>
                    <input id="email" type="email" name="email" value="{{ old('email', $tenant->email) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('email') @enderror" 
                        required>
                    @error('email')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Téléphone --}}
                <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Téléphone</label>
                    <input id="phone" type="text" name="phone" value="{{ old('phone', $tenant->phone) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('phone') @enderror" 
                        required>
                    @error('phone')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Adresse --}}
                <div>
                    <label for="address" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Adresse</label>
                    <input id="address" type="text" name="address" value="{{ old('address', $tenant->address) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('address') @enderror" 
                        required>
                    @error('address')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Compte bancaire --}}
                <div class="md:col-span-2">
                    <label for="bank_account" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Compte Bancaire</label>
                    <input id="bank_account" type="text" name="bank_account" value="{{ old('bank_account', $tenant->bank_account) }}" 
                        class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white focus:ring-blue-500 focus:border-blue-500 @error('bank_account') border-red-500 @enderror" 
                        required>
                    @error('bank_account')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- Boutons --}}
            <div class="mt-6 flex justify-end space-x-4">
                <a href="{{ route('tenants.index') }}" 
                    class="px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:ring-2 focus:ring-gray-400">
                    Annuler
                </a>
                <button type="submit" 
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-400">
                    Appliquer la modification
                </button>
            </div>

        </form>
    </div>
</x-app-layout>
