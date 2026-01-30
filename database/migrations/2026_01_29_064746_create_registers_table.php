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
        Schema::create('registers', function (Blueprint $table) {
            $table->id();
            $table->string('email')->unique();
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('whatsapp');
            $table->enum('gender', ['L', 'P']);
            $table->date('birth_date')->nullable();
            $table->text('address')->nullable();
            $table->string('education'); // SD, SMP, SMA, Umum
            $table->string('program');   // Reguler 2 Minggu, dsb
            $table->string('schedule');  // 16:30 atau 18:30
            $table->string('shirt_size')->nullable();
            $table->string('source')->nullable(); // Instagram, TikTok, dsb
            $table->enum('status', ['pending', 'enrolled', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('register');
    }
};
