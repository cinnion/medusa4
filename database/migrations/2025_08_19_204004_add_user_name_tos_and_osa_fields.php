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
        Schema::table('users', function (Blueprint $table) {
            $table->string('rank')->default('Commander');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');

            $table->timestamp('previous_login')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->integer('forum_last_login')->nullable();
            $table->date('osa');
            $table->boolean('tos');
            $table->boolean('active');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('rank');
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');

            $table->dropColumn('forum_last_login');
            $table->dropColumn('osa');
            $table->dropColumn('tos');
        });
    }
};
