<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            Artikel aanmaken
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form method="POST" action="{{ route('articles.store') }}">
                    @csrf

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="name">
                            Naam
                        </label>
                        <input name="name" id="name" type="text" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-200" value="{{ old('name') }}">
                        @error('name')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="stock">
                            Voorraad
                        </label>
                        <input name="stock" id="stock" type="number" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-200" value="{{ old('stock') }}">
                        @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="stock_type">
                            Voorraadtype
                        </label>
                        <input name="stock_type" id="stock_type" type="text" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-200" value="{{ old('stock_type') }}">
                        @error('stock_type')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 dark:text-gray-300 text-sm font-bold mb-2" for="minimum_stock">
                            Minimale voorraad
                        </label>
                        <input name="minimum_stock" id="minimum_stock" type="number" class="w-full rounded border-gray-300 dark:bg-gray-700 dark:text-gray-200" value="{{ old('minimum_stock') }}">
                        @error('minimum_stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="flex justify-end">
                        <a href="{{ route('articles.index') }}" class="text-gray-600 dark:text-gray-300 hover:underline mr-4">Annuleren</a>
                        <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">
                            Opslaan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
