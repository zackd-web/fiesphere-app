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
    Schema::create('students', function (Blueprint $table) {
        $table->id();
        $table->string('name'); // Sesuai input "Nama Lengkap" di index.html
        $table->string('whatsapp'); // Sesuai input "No. WhatsApp"
        $table->enum('method', ['Online', 'Offline']); // Sesuai pilihan "Pilih Metode"
        $table->string('program'); // Sesuai pilihan "Program" (Speaking, IELTS, dll)
        $table->enum('status', ['pending', 'contacted', 'enrolled'])->default('pending'); // Untuk manajemen di Dashboard Admin
        $table->text('note')->nullable(); // Catatan tambahan buat admin
        $table->timestamps(); // Wajib untuk tracking data masuk (Bab I & II PPL)
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
