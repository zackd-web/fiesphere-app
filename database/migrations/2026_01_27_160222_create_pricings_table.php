<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Run: php artisan make:migration create_pricings_table
       Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('duration')->default('/ bulan');
            $table->json('features'); // Isinya array: ["8x Pertemuan", "Grup WA", ...]
            $table->string('button_text')->default('Pilih Paket');
            $table->string('button_link')->default('#register');
            $table->boolean('is_featured')->default(false); // Buat nentuin mana yang warnanya biru/tengah
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricings');
    }
};
