<x-guest-layout class="min-h-screen flex flex-col">
    <header class="bg-primary">
        <h1 class="flex justify-center text-white font-black text-3xl mb-10 pt-4">{{ __('Contact') }}</h1>
        <nav class="flex justify-center space-x-4 pb-4">
            <a href="/" class="text-white hover:text-secondary">{{ __('Home') }}</a>
            <a href="/menu" class="text-white hover:text-secondary">{{ __('Menu') }}</a>
            <a href="/reserveren" class="text-white hover:text-secondary">{{ __('Book') }}</a>
        </nav>
    </header>

    <main class="flex flex-col items-center justify-center bg-cover bg-begin px-4 py-4" style="background-image: url('{{ asset('storage/assets/images/MainBg.jpg') }}');">
        {{-- Plaats hier eventuele sessieberichten bovenaan de main of vlak boven het formulier --}}
        @if (session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif

        @if (session('error'))
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Error!</strong>
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        @endif

        {{-- Laravel's validatiefouten --}}
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Whoops!</strong>
                <span class="block sm:inline">Er waren enkele problemen met je invoer.</span>
                <ul class="mt-3 list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('contact.send') }}" class="bg-white bg-opacity-90 p-8 rounded-3xl shadow-lg w-full max-w-2xl space-y-6">
            @csrf

            <div>
                <label for="name" class="block text-xl font-bold text-gray-700">{{ __('Name') }}</label>
                <input
                    type="text"
                    id="name"
                    name="name"
                    required
                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary @error('name') border-red-500 @enderror"
                    value="{{ old('name') }}" {{-- Behoudt de oude invoer bij validatiefouten --}}
                >
                @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="email" class="block text-xl font-bold text-gray-700">{{ __('Email') }}</label>
                <input
                    type="email"
                    id="email"
                    name="email"
                    required
                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary @error('email') border-red-500 @enderror"
                    value="{{ old('email') }}" {{-- Behoudt de oude invoer bij validatiefouten --}}
                >
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="message" class="block text-xl font-bold text-gray-700">{{ __('Message') }}</label>
                <textarea
                    id="message"
                    name="message"
                    rows="5"
                    required
                    class="mt-1 block w-full rounded-xl border-gray-300 shadow-sm focus:ring-primary focus:border-primary @error('message') border-red-500 @enderror"
                >{{ old('message') }}</textarea> {{-- Behoudt de oude invoer bij validatiefouten --}}
                @error('message')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-center">
                <button type="submit" class="px-6 py-3 bg-primary text-white text-xl font-bold rounded-3xl hover:bg-secondary transition">
                    {{ __('Send Message') }}
                </button>
            </div>
        </form>
    </main>
</x-guest-layout>
