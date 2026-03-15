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
        Schema::create('mentors', function (Blueprint $table) {
            $table->id();

            $table->string('name');                    // "ANANDA ZAKA"
            $table->string('specialization');          // "GRAMMAR & STRUCTURE MASTER"
            $table->string('expertise_badge');         // "IELTS 8.0 EXPERT"
            $table->string('photo_path');              // path foto di storage
            $table->json('tags');                      // ["Ex-Tutor Pare", "TESOL Certified"]
            $table->boolean('is_active')->default(true);
            $table->integer('order')->default(0);      // urutan tampil di landing page

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mentors');
    }
};
