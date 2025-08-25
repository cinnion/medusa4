<?php

use Illuminate\Database\Migrations\Migration;
use MongoDB\Laravel\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('branch')) {
            Schema::create('branch', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('branch', 10)->unique();
                $table->string('branch_name', 100);
                $table->json('equivalent');

            });
        } else {
            echo "Table 'branch' already exists. Skipping migration.\n";
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch');
    }
};
