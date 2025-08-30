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
        if (!Schema::hasTable('events')) {
            Schema::create('events', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->string('event_name');
                $table->string('address1');
                $table->string('address2');
                $table->string('city');
                $table->string('state_province');
                $table->string('postal_code');
                $table->string('country');
                $table->date('start_date');
                $table->date('end_date');
                $table->json('registrars');
                $table->string('requestor');
                $table->json('checkins');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
