<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-white leading-tight">
            Add New Order
        </h2>
    </x-slot>

    <div class="py-6 px-4">
        @if($errors->any())
            <div class="bg-red-200 p-2 rounded mb-4 text-red-800">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('orders.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="reservation_id" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Reservation</label>
                <select name="reservation_id" id="reservation_id" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600">
                    @foreach($reservations as $reservation)
                        <option value="{{ $reservation->id }}">
                            {{ $reservation->id }} - {{ $reservation->user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Dishes</label>
                <div id="dish-container">
                    <div class="flex mb-2">
                        <select name="dish_ids[]" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600">
                            @foreach($gerechten as $gerecht)
                                <option value="{{ $gerecht->id }}">{{ $gerecht->name }}</option>
                            @endforeach
                        </select>
                        <button type="button" onclick="addDishSelect()" class="ml-2 bg-green-500 text-white px-2 rounded">+</button>
                    </div>
                </div>
            </div>

            <div class="mb-4">
                <label for="status" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Status</label>
                <input type="text" value="open" readonly name="status" id="status" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600">
            </div>

            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Add Order</button>
        </form>
    </div>

    <script>
        function addDishSelect() {
            const container = document.getElementById('dish-container');
            const selectHTML = `
                <div class="flex mb-2">
                    <select name="dish_ids[]" class="border rounded w-full p-2 dark:bg-gray-700 dark:border-gray-600">
                        @foreach($gerechten as $gerecht)
            <option value="{{ $gerecht->id }}">{{ $gerecht->name }}</option>
                        @endforeach
            </select>
            <button type="button" onclick="this.parentElement.remove()" class="ml-2 bg-red-500 text-white px-2 rounded">−</button>
        </div>
`;
            container.insertAdjacentHTML('beforeend', selectHTML);
        }
    </script>
</x-app-layout>
