<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   // 2026_02_01_154018_create_registrations_table.php
    public function up(): void
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            // Hubungkan ke tabel pricings dan schedules
            $table->foreignId('pricing_id')->constrained('pricings'); 
            $table->foreignId('schedule_id')->constrained('schedules');
            
            $table->string('name');
            $table->string('nickname');
            $table->string('email')->unique();
            $table->string('whatsapp');
            $table->enum('gender', ['L', 'P']);
            $table->date('birth_date');
            $table->text('address');
            $table->string('school_origin')->nullable(); // Asal Sekolah
            $table->string('education');
            $table->enum('class_type', ['online', 'offline'])->default('offline');
            $table->string('source'); 
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
