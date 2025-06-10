<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="overflow-hidden dark:text-white">
        <div class="p-6">
            <div class="border border-gray-300 dark:border-gray-700 p-4 rounded-lg w-max">
                <p class="font-semibold mb-2">{{ __('Select period:') }}</p>
                <div class="flex">
                    <button
                        type="button"
                        onclick="window.location.href='{{ route('dashboard', ['periode' => 'dag']) }}'"
                        class="px-4 py-2 rounded-l-lg focus:outline-none
                            {{ $periode === 'dag' ? 'bg-blue-700 text-white' : 'bg-blue-500 text-white hover:bg-blue-600' }}">
                        {{__('Day')}}
                    </button>
                    <button
                        type="button"
                        onclick="window.location.href='{{ route('dashboard', ['periode' => 'week']) }}'"
                        class="px-4 py-2 focus:outline-none
                            {{ $periode === 'week' ? 'bg-blue-700 text-white' : 'bg-blue-500 text-white hover:bg-blue-600' }}">
                        {{__('Week')}}
                    </button>
                    <button
                        type="button"
                        onclick="window.location.href='{{ route('dashboard', ['periode' => 'maand']) }}'"
                        class="px-4 py-2 focus:outline-none
                            {{ $periode === 'maand' ? 'bg-blue-700 text-white' : 'bg-blue-500 text-white hover:bg-blue-600' }}">
                        {{__('Month')}}
                    </button>
                    <button
                        type="button"
                        onclick="window.location.href='{{ route('dashboard', ['periode' => 'jaar']) }}'"
                        class="px-4 py-2 rounded-r-lg focus:outline-none
                            {{ $periode === 'jaar' ? 'bg-blue-700 text-white' : 'bg-blue-500 text-white hover:bg-blue-600' }}">
                        {{__('Year')}}
                    </button>
                </div>
                <h3 class="text-lg font-bold mb-2 mt-6">{{ __('Total amount orders in last ') . $periode }}:</h3>
                <div class="text-3xl font-extrabold">
                    {{ $totalOrders }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
