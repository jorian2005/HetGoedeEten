<x-guest-layout class="min-h-screen flex flex-col">
    <x-guest-navigation />

    <main class="flex-1 flex items-center justify-center bg-cover bg-begin" style="background-image: url('{{ asset('storage/assets/images/MainBg.jpg') }}');">
        <div class="flex flex-col space-y-4">
            <a href="/book"
               class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[620px] text-xl sm:text-4xl font-bold rounded-3xl text-center content-center">
                {{ __('Reserve your place') }}
            </a>
            <div class="flex gap-[20px]">
                <a href="tel:+31612345678" class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[300px] text-xl sm:text-4xl text-center content-center font-bold rounded-3xl">{{ __('Cal Now!') }}</a>
                <a href="mailto:info@example.com" class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[300px] text-xl sm:text-4xl text-center content-center font-bold rounded-3xl">{{ __('Mail Now!') }}</a>
            </div>
        </div>
    </main>
</x-guest-layout>
