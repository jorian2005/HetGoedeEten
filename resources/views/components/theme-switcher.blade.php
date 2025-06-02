<div
    x-data="{ theme: Theme.get() }"
    @click="theme = theme === 'light' ? 'dark' : 'light'; Theme.set(theme);"
    class="relative w-20 h-10 rounded-full cursor-pointer bg-gray-300 dark:bg-gray-600 transition-colors duration-300 focus:outline-none focus:ring-2 focus:ring-indigo-500"
    role="switch"
    :aria-checked="theme === 'dark'"
    tabindex="0"
    @keydown.enter="$el.click()"
    @keydown.space.prevent="$el.click()"
>
    <!-- Slider-bol achteraan -->
    <div
        class="absolute top-1 left-1 w-8 h-8 rounded-full bg-white dark:bg-gray-800 shadow-md transform transition-transform duration-300 z-0"
        :class="{ 'translate-x-10': theme === 'dark' }"
    ></div>

    <!-- Zon icoon -->
    <div class="absolute left-1 top-1.5 w-7 h-7 flex items-center justify-center z-10 pointer-events-none transition-colors duration-300"
         :class="theme === 'light' ? 'text-yellow-400' : 'text-gray-400'"
    >
        <x-icons.sun class="w-5 h-5" />
    </div>

    <!-- Maan icoon -->
    <div class="absolute right-1 top-1.5 w-7 h-7 flex items-center justify-center z-10 pointer-events-none transition-colors duration-300"
         :class="theme === 'dark' ? 'text-blue-300' : 'text-gray-400'"
    >
        <x-icons.moon class="w-5 h-5" />
    </div>
</div>
