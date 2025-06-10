<div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-cover bg-center" style="background-image: url('{{ asset('storage/assets/images/MainBg.jpg') }}');">
    <div>
        <h1 class="text-center text-2xl font-bold text-white mt-4">{{ config('app.name', 'Laravel') }}</h1>
    </div>

    <div class="w-full sm:max-w-md mt-6 px-6 py-4 bg-white bg-opacity-90 backdrop-blur-md shadow-md overflow-hidden sm:rounded-lg">
        {{ $slot }}
    </div>
</div>
