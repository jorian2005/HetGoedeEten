<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class restaurantData extends Seeder
{
    public function run(): void
    {
        // 👤 Gebruikers
        $user1 = DB::table('users')->insertGetId([
            'name' => 'Jan de Boer',
            'email' => 'jan@example.com',
            'password' => Hash::make('wachtwoord'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $user2 = DB::table('users')->insertGetId([
            'name' => 'Maria Jansen',
            'email' => 'maria@example.com',
            'password' => Hash::make('geheim123'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 📅 Reserveringen
        $reservation1 = DB::table('reservations')->insertGetId([
            'user_id' => $user1,
            'number_of_guests' => 2,
            'status' => 'open',
            'date' => now()->toDateString(),
            'time' => '18:30:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $reservation2 = DB::table('reservations')->insertGetId([
            'user_id' => $user2,
            'number_of_guests' => 5,
            'status' => 'open',
            'date' => now()->addDays(1)->toDateString(),
            'time' => '19:00:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $reservation3 = DB::table('reservations')->insertGetId([
            'user_id' => $user1,
            'number_of_guests' => 3,
            'status' => 'open',
            'date' => now()->addDays(2)->toDateString(),
            'time' => '17:45:00',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🍽️ Gerechten
        $dish1 = DB::table('dishes')->insertGetId([
            'name' => 'Stamppot met worst',
            'description' => 'Hollandse stamppot met rookworst en jus.',
            'price' => 12.50,
            'type' => 'Hoofdgerecht',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $dish2 = DB::table('dishes')->insertGetId([
            'name' => 'Erwtensoep',
            'description' => 'Traditionele dikke soep met spliterwten en rookworst.',
            'price' => 9.00,
            'type' => 'Voorgerecht',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $dish3 = DB::table('dishes')->insertGetId([
            'name' => 'Poffertjes',
            'description' => 'Kleine pannenkoekjes met poedersuiker en boter.',
            'price' => 5.50,
            'type' => 'Nagerecht',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🧾 Bestellingen (zonder dish_id)
        DB::table('orders')->insert([
            [
                'reservation_id' => $reservation1,
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => $reservation2,
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'reservation_id' => $reservation3,
                'status' => 'open',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 📦 Artikelen
        $article1 = DB::table('articles')->insertGetId([
            'name' => 'Aardappelen',
            'stock' => 100,
            'stock_type' => 'kg',
            'minimum_stock' => 20,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $article2 = DB::table('articles')->insertGetId([
            'name' => 'Rookworst',
            'stock' => 50,
            'stock_type' => 'stuks',
            'minimum_stock' => 10,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        $article3 = DB::table('articles')->insertGetId([
            'name' => 'Spliterwten',
            'stock' => 80,
            'stock_type' => 'kg',
            'minimum_stock' => 15,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // 🧂 Ingrediënten
        DB::table('ingredients')->insert([
            [
                'dish_id' => $dish1,
                'article_id' => $article1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dish_id' => $dish1,
                'article_id' => $article2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dish_id' => $dish2,
                'article_id' => $article3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dish_id' => $dish2,
                'article_id' => $article2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'dish_id' => $dish3,
                'article_id' => $article1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        // 🛒 Order items
        DB::table('order_items')->insert([
            [
                'order_id' => 1,
                'dish_id' => $dish1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 1,
                'dish_id' => $dish2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 2,
                'dish_id' => $dish3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'dish_id' => $dish1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'dish_id' => $dish2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'order_id' => 3,
                'dish_id' => $dish3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
