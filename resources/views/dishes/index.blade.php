<x-app-layout>
    <x-slot name="header">
        <div x-data="{ open: false }" class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-2">
            <div class="flex items-center justify-between sm:justify-start sm:gap-2">
                <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                    {{ __('Menu Overview') }}
                </h2>
                <button @click="open = !open" class="text-xl sm:hidden font-semibold text-gray-800 dark:text-gray-200 focus:outline-none">
                    <span x-text="open ? '▾' : '▸'"></span>
                </button>
            </div>

            <div class="hidden sm:flex flex-wrap gap-2">
                <a href="{{ route('dishes.create') }}" class="px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">
                    {{ __('Add New Dish') }}
                </a>
            </div>

            <div x-show="open" x-transition class="flex flex-col gap-2 sm:hidden">
                <a href="{{ route('dishes.create') }}" class="w-full px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600">
                    {{ __('Add New Dish') }}
                </a>
            </div>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                        <tr>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Name') }}</th>
                            <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Description') }}</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Price') }}</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Type') }}</th>
                            <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">{{ __('Actions') }}</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-800">
                        @foreach($dishes as $dish)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $dish->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900 dark:text-gray-300">{{ $dish->description }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-300">€{{ number_format($dish->price, 2) }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-right text-gray-900 dark:text-gray-300">{{ $dish->type }}</td>
                                <td class="px-6 py-4 text-sm text-right flex justify-end gap-2">
                                    <a href="{{ route('dishes.edit', $dish) }}" class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-500">
                                        <x-icons.pencil />
                                    </a>
                                    <form method="POST" action="{{ route('dishes.destroy', $dish) }}" onsubmit="return confirm('Are you sure you want to delete this dish?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-500">
                                            <x-icons.trash />
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
