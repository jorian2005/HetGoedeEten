<x-app-layout :title="__('Settings')">
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Settings') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mx-auto py-6">
        <div class="bg-white dark:bg-gray-800 shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('admin.settings.update') }}" enctype="multipart/form-data" class="space-y-6">
                @csrf

                <div>
                    <label for="site_title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Website Title') }}</label>
                    <input type="text" name="site_title" id="site_title" value="{{ $settings['site_title'] ?? '' }}"
                           class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white focus:ring-indigo-500 focus:border-indigo-500">
                </div>

                <div>
                    <label for="site_logo" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Logo') }}</label>
                    <input type="file" name="site_logo" id="site_logo"
                           class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 file:bg-gray-100 file:border file:rounded file:py-1 file:px-3 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200">
                    @if(isset($settings['site_logo']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['site_logo']) }}" alt="Logo" width="100" class="rounded shadow">
                        </div>
                    @endif
                </div>

                <div>
                    <label for="site_favicon" class="block text-sm font-medium text-gray-700 dark:text-gray-300">{{ __('Favicon') }}</label>
                    <input type="file" name="site_favicon" id="site_favicon"
                           class="mt-1 block w-full text-sm text-gray-900 dark:text-gray-300 file:bg-gray-100 file:border file:rounded file:py-1 file:px-3 file:text-sm file:font-semibold file:text-gray-700 hover:file:bg-gray-200">
                    @if(isset($settings['site_favicon']))
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $settings['site_favicon']) }}" alt="Favicon" width="32" class="rounded shadow">
                        </div>
                    @endif
                </div>

                <!-- Submit button -->
                <div class="text-right">
                    <button type="submit"
                            class="inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-indigo-700 border border-transparent rounded-md font-semibold text-white hover:bg-indigo-700 dark:hover:bg-indigo-800 focus:outline-none focus:ring-2 focus:ring-indigo-500">
                        {{ __('Save') }}
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
