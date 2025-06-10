<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsAndDishesTables extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // 📅 Reserveringen
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->integer('number_of_guests');
            $table->string('status');
            $table->date('date');
            $table->time('time');
            $table->timestamps();
        });

        // 🍽️ Gerechten
        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->string('type');
            $table->timestamps();
        });

        // 🧾 Bestellingen
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('reservations')->onDelete('cascade');
            $table->string('status');
            $table->timestamps();
        });

        // 📦 Artikelen
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('stock');
            $table->string('stock_type');
            $table->integer('minimum_stock');
            $table->timestamps();
        });

        // 🧂 Ingrediënten
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id();
            $table->foreignId('dish_id')->constrained('dishes')->onDelete('cascade');
            $table->foreignId('article_id')->constrained('articles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ingredients');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('orders');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('reservations');
    }
}
