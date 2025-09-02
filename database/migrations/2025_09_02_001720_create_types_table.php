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
        if (!Schema::hasTable('types')) {
            Schema::create('types', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('chapter_type');
                $table->string('chapter_description');
                $table->json('can_have');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('types');
    }
};
