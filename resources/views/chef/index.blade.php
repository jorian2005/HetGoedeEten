<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Chef-dashboard
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        @if(session('success'))
            <div class="bg-green-200 p-2 rounded mb-4 text-green-800">{{ session('success') }}</div>
        @endif

        @forelse ($openBestellingen as $order)
            <div class="border rounded p-4 mb-6 shadow dark:bg-gray-800 dark:text-white">
                <h2 class="text-xl font-semibold">Bestelling #{{ $order->id }}</h2>
                <ul class="list-disc pl-5 mb-3">
                    @foreach ($order->gerechten as $gerecht)
                        <li class="gerecht-item cursor-pointer" data-order="{{ $order->id }}" data-gerecht="{{ $gerecht->name }}">
                            {{ $gerecht->name }}
                        </li>
                    @endforeach
                </ul>
                <p>Status: {{ $order->status }}</p>
                <form action="{{ route('chef.bestelling.klaar', $order) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
                        Markeer als klaar
                    </button>
                </form>
            </div>
        @empty
            <p class="dark:text-gray-300">Geen openstaande bestellingen.</p>
        @endforelse
    </div>

    <script>
        function storageKey(orderId, gerechtNaam) {
            return `gerecht_done_${orderId}_${gerechtNaam}`;
        }

        document.querySelectorAll('.gerecht-item').forEach(item => {
            // Check localStorage bij laden en style toepassen
            const orderId = item.getAttribute('data-order');
            const gerechtNaam = item.getAttribute('data-gerecht');
            if(localStorage.getItem(storageKey(orderId, gerechtNaam)) === 'true') {
                item.style.textDecoration = 'line-through';
            }

            item.addEventListener('click', () => {
                const key = storageKey(orderId, gerechtNaam);
                const isDone = localStorage.getItem(key) === 'true';
                if(isDone) {
                    localStorage.removeItem(key);
                    item.style.textDecoration = 'none';
                } else {
                    localStorage.setItem(key, 'true');
                    item.style.textDecoration = 'line-through';
                }
            });
        });
    </script>
</x-app-layout>
