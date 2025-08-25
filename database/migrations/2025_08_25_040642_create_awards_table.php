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
        Schema::create('awards', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->integer('display_order')->default(0);
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->string('post_nominal')->nullable();
            $table->string('replaces')->nullable();
            $table->string('location');
            $table->boolean('multiple')->default(false);
            $table->string('group_label')->nullable();
            $table->string('image')->nullable();
            $table->string('branch')->nullable();
            $table->string('star_nation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('awards');
    }
};
