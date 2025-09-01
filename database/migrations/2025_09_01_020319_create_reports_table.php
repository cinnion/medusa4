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
        if (!Schema::hasTable('reports')) {
            Schema::create('reports', function (Blueprint $table) {
                $table->id();
                $table->timestamps();

                $table->text('activities');
                $table->text('award_actions');
                $table->string('chapter_id');
                $table->json('chapter_info');
                $table->json('command_crew');
                $table->string('courses');
                $table->json('new_crew');
                $table->text('problems');
                $table->text('promotion_actions');
                $table->text('questions');
                $table->string('report_date');  // YYYY-mm
                $table->date('report_sent');
                $table->string('send_report');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
