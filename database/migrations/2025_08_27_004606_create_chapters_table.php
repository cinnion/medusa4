<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('ratings')) {
            Schema::create('chapters', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('chapter_name')->unique();
                $table->string('branch');
                $table->string('chapter_type');
                $table->string('hull_number');
                $table->string('ship_class');
                $table->string('assigned_to');
                $table->string('commission_date');
                $table->string('decommission_date')->nullable();
                $table->boolean('joinable');
                $table->boolean('idcards_printed');
                $table->string('tool_tip');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chapters');
    }
};
