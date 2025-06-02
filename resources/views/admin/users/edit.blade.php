<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Roles for') }} {{ $user->name }}
        </h2>
    </x-slot>

    <div class="max-w-3xl mx-auto py-6">
        <div class="bg-white dark:bg-gray-800 shadow sm:rounded-lg p-6">
            <form action="{{ route('admin.users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">{{ __('Name') }}</label>
                    <p class="text-gray-900 dark:text-gray-200">{{ $user->name }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">{{ __('Email') }}</label>
                    <p class="text-gray-900 dark:text-gray-200">{{ $user->email }}</p>
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 dark:text-gray-300 font-semibold mb-2">{{ __('Roles') }}</label>
                    @foreach ($roles as $role)
                        <label class="inline-flex items-center mr-4 mb-2">
                            <input type="checkbox" name="roles[]" value="{{ $role->name }}"
                                   {{ $user->hasRole($role->name) ? 'checked' : '' }}
                                   class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <span class="ml-2 text-sm text-gray-700 dark:text-gray-300">{{ $role->name }}</span>
                        </label>
                    @endforeach
                </div>

                <div>
                    <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">
                        {{ __('Save') }}
                    </button>
                    <a href="{{ route('admin.users.index') }}" class="ml-4 text-sm text-gray-600 hover:text-gray-900 dark:text-gray-400">
                        {{ __('Cancel') }}
                    </a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
