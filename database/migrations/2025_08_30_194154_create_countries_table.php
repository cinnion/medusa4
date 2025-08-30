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
            Schema::create('countries', function (Blueprint $table) {
                $table->id();

                $table->string('capital');
                $table->string('citizenship');
                $table->string('country_code');
                $table->string('currency');
                $table->string('currency_code');
                $table->string('currency_sub_unit');
                $table->string('full_name');
                $table->string('iso_3166_2');
                $table->string('iso_3166_3');
                $table->string('name');
                $table->string('region_code');
                $table->string('sub_region_code');
                $table->boolean('eea');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('countries');
    }
};
