<div class="h-full flex flex-col justify-between p-4 dark:bg-primary dark:text-white">
    <!-- Upper Section with Logo and Navigation -->
    <div>
        <!-- Logo -->
        <div class="mb-6 px-2">
            <a href="{{ route('dashboard') }}">
                <x-application-mark class="block h-10 w-auto" />
            </a>
        </div>

        <nav class="flex flex-col">
            <x-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-nav-link>
        </nav>
    </div>

    <div>
        <!-- Admin Section -->
            <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4">
                <div class="text-xs uppercase my-2 px-1">{{ __('Admin') }}</div>
                <nav class="flex flex-col">
                        <x-nav-link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.*')">
                            {{ __('Users') }}
                        </x-nav-link>
                        <x-nav-link href="{{ route('admin.roles.index') }}" :active="request()->routeIs('admin.roles.*')">
                            {{ __('Roles') }}
                        </x-nav-link>
                </nav>
            </div>

        <!-- Account Section -->
        <div class="border-t border-gray-200 dark:border-gray-700 pt-4 mt-4 pb-2">
            <div class="text-xs uppercase my-2 px-1">{{ __('Account') }}</div>
            <nav>
                <x-nav-link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    {{ __('Profile') }}
                </x-nav-link>
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <x-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Logout') }}
                    </x-nav-link>
                </form>
            </nav>
        </div>
        <x-theme-switcher />
    </div>
</div>
