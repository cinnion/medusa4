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
        if (!Schema::hasTable('change_requests')) {
            Schema::create('change_requests', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('user');
                $table->string('requestor');
                $table->string('req_type');
                $table->string('old_value');
                $table->string('new_value');
                $table->string('status')->default('open');
                $table->softDeletes();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('change_requests');
    }
};
