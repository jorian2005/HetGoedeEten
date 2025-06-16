<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        {{ isset($title) ? $title . ' - ' : '' }}
        {{ \App\Models\Setting::get('site_title') ?? config('app.name', 'Het Goede Eten') }}
    </title>
    <link rel="icon" href="{{ \App\Models\Setting::get('site_favicon') ? asset('storage/' . \App\Models\Setting::get('site_favicon')) : asset('storage/assets/images/Logo.png') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        (function () {
            const theme = localStorage.theme === 'dark' ||
            (!('theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
                ? 'dark'
                : 'light';

            if (theme === 'dark') {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    <!-- Styles -->
    @livewireStyles
</head>
<body
    class="font-sans antialiased h-full bg-gray-100 dark:bg-gray-900"
    x-data="{ sidebarOpen: false }"
    x-init="Theme.set()"
>

<x-banner />

<div class="flex h-screen overflow-hidden">

    <!-- Mobile overlay when sidebar is open -->
    <div
        class="fixed inset-0 z-40 md:hidden"
        x-show="sidebarOpen"
        x-transition:enter="transition-opacity ease-linear duration-300"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition-opacity ease-linear duration-300"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        style="display: none;"
    >
        <div class="absolute inset-0 bg-black opacity-50" @click="sidebarOpen = false"></div>
    </div>

    <!-- Sidebar -->
    <aside
        class="fixed inset-y-0 left-0 z-50 w-44 transform bg-primary-light dark:bg-gray-800 h-screen overflow-y-auto transition-transform duration-300 ease-in-out md:translate-x-0 md:static md:inset-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >
        @livewire('navigation-menu')
    </aside>

    <!-- Main content -->
    <div class="flex-1 flex flex-col w-0">
        <!-- Top bar (mobile only) -->
        <div class="md:hidden flex items-center justify-between bg-white dark:bg-gray-800 px-4 py-3 border-b border-gray-200 dark:border-gray-700">
            <button @click="sidebarOpen = true" class="text-gray-500 dark:text-gray-300 focus:outline-none focus:ring">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                    <path d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <div class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                {{ config('app.name', 'Het Goede Eten') }}
            </div>
        </div>

        <!-- Page Header -->
        @if (isset($header))
            <header class="bg-primary-light dark:bg-primary shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endif

        <!-- Page Content -->
        <main class="flex-1 overflow-y-auto">
            {{ $slot }}
        </main>
    </div>
</div>

@stack('modals')
@livewireScripts
</body>
</html>
