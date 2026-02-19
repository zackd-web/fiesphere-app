<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up(): void{
    Schema::create('registrations', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('nickname'); // TAMBAHKAN INI
        $table->string('email')->unique();
        $table->string('whatsapp');
        $table->enum('gender', ['L', 'P']);
        $table->date('birth_date');
        $table->text('address');
        $table->string('education');
        $table->string('program');
        $table->string('schedule'); // TAMBAHKAN INI
        $table->string('shirt_size'); // TAMBAHKAN INI
        $table->string('source'); // TAMBAHKAN INI
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
