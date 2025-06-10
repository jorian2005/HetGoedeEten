<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Role') }}
        </h2>
        <a href="{{ route('admin.roles.index') }}" class="text-gray-800 dark:text-gray-300 dark:hover:text-gray-400 hover:text-gray-700">
            {{ __('Back to overview') }}
        </a>
    </x-slot>

    <div class="max-w-7xl mx-auto">
        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg p-6">
            <form method="POST" action="{{ route('admin.roles.store') }}">
                @csrf
                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Role Name') }}
                    </label>
                    <input type="text" name="name" required
                           class="mt-1 block w-full rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-200 shadow-sm">
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                        {{ __('Permissions') }}
                    </label>
                    <div class="grid grid-cols-2 gap-2 mt-2">
                        @foreach ($permissions as $permission)
                            <label class="flex items-center space-x-2 text-sm text-gray-700 dark:text-gray-300">
                                <input type="checkbox" name="permissions[]" value="{{ $permission->name }}"
                                       class="rounded border-gray-300 dark:border-gray-600 dark:bg-gray-700">
                                <span>{{ __($permission->name) }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="mt-4 bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700">
                    {{ __('Create Role') }}
                </button>
            </form>
        </div>
    </div>
</x-app-layout>
