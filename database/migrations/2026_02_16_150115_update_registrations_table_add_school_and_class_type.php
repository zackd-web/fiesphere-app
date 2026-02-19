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
        Schema::table('registrations', function (Blueprint $table) {
            // Hapus kolom lama
            $table->dropColumn('shirt_size'); 

            // Tambah kolom baru
            $table->string('school_origin')->nullable()->after('address'); // Asal Sekolah
            $table->enum('class_type', ['online', 'offline'])->default('offline')->after('program'); 
        });
    }

public function down(): void
{
    Schema::table('registrations', function (Blueprint $table) {
        $table->string('shirt_size')->nullable();
        $table->dropColumn(['school_origin', 'class_type']);
    });
}
};
