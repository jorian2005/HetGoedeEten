<x-guest-layout class="min-h-screen flex flex-col">
    <x-guest-navigation />

    <main class="flex-1 flex items-center justify-center bg-cover bg-begin" style="background-image: url('{{ asset('storage/assets/images/MainBg.jpg') }}');">
        <div class="flex flex-col space-y-4">
            <button class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[620px] text-xl sm:text-4xl font-bold rounded-3xl">{{ __('Reserve your place') }}</button>
            <div class="flex gap-[20px]">
                <button class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[300px] text-xl sm:text-4xl font-bold rounded-3xl">{{ __('Cal Now!') }}</button>
                <button class="px-4 py-2 bg-primary text-white h-15 sm:h-20 sm:w-[300px] text-xl sm:text-4xl font-bold rounded-3xl">{{ __('Mail Now!') }}</button>
            </div>
        </div>
    </main>
</x-guest-layout>
