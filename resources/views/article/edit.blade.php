<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-3xl mx-auto bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('articles.update', $article) }}">
                @csrf
                @method('PUT')

                <!-- Name -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="name">
                        {{__('Name')}}
                    </label>
                    <input id="name" name="name" type="text" value="{{ old('name', $article->name) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
                </div>

                <!-- Stock -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="stock">
                        {{__('Stock')}}
                    </label>
                    <input id="stock" name="stock" type="number" value="{{ old('stock', $article->stock) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
                </div>

                <!-- Stock Type -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="stock_type">
                        {{__('Stock Type')}}
                    </label>
                    <input id="stock_type" name="stock_type" type="text" value="{{ old('stock_type', $article->stock_type) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
                </div>

                <!-- Minimum Stock -->
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300" for="minimum_stock">
                        {{__('Minimum Stock')}}
                    </label>
                    <input id="minimum_stock" name="minimum_stock" type="number" value="{{ old('minimum_stock', $article->minimum_stock) }}" required
                           class="mt-1 block w-full rounded-md border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-white shadow-sm focus:ring focus:ring-indigo-200 focus:border-indigo-300" />
                </div>

                <!-- Action buttons -->
                <div class="flex justify-end space-x-4">
                    <a href="{{ route('articles.index') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-200 dark:bg-gray-700 text-gray-700 dark:text-gray-300 text-sm font-medium rounded-md hover:bg-gray-300 dark:hover:bg-gray-600">
                        {{__('Cancel')}}
                    </a>
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white text-sm font-medium rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{__('Save')}}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
