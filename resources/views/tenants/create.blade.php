<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Créer un nouveau locataire') }}
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto mt-6 p-6 bg-white dark:bg-gray-800 shadow-md rounded-lg">

        <div class="mb-4">
            <a href="{{ route('tenants.index') }}" class="text-blue-600 dark:text-blue-400 hover:underline">
                ← Retour à la liste des locataires
            </a>
        </div>

        <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
            <form action="{{ route('tenants.store') }}" method="POST">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Nom :</label>
                    <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror" id="name" name="name" required>
                    @error('name')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Email :</label>
                    <input type="email" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror" id="email" name="email" required>
                    @error('email')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="phone" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Téléphone :</label>
                    <input type="tel" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('phone') border-red-500 @enderror" id="phone" name="phone">
                    @error('phone')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="address" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">Adresse :</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('address') border-red-500 @enderror" id="address" name="address" rows="3"></textarea>
                    @error('address')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="bank_account" class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2">IBAN :</label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 dark:text-gray-300 leading-tight focus:outline-none focus:shadow-outline @error('bank_account') border-red-500 @enderror" id="bank_account" name="bank_account" rows="3"></textarea>
                    @error('bank_account')
                        <span class="text-red-500 text-xs italic">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button type="submit" 
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 
                    focus:outline-none focus:ring-2 focus:ring-green-400">
                    Ajouter
                </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
