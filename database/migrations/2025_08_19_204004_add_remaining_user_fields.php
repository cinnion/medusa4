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
            $table->dropColumn('name');

            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('suffix')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('city');
            $table->string('state_province');
            $table->string('postal_code');
            $table->string('country');
            $table->string('phone_number')->nullable();

            $table->date('dob');
            $table->date('application_date');
            $table->date('registration_date');
            $table->string('registration_status');
            $table->string('member_id')->unique()->nullable();
            $table->boolean('idcard_printed')->nullable();
            $table->boolean('promotionStatus');
            $table->json('points')->default(0);

            $table->string('branch');
            $table->json('rank');
            $table->string('rating');
            $table->string('path');

            $table->json('awards');
            $table->json('history');
            $table->json('assignment');
            $table->json('permissions');
            $table->json('peerages');
            $table->unsignedBigInteger('lastUpdate');

            $table->timestamp('previous_login')->nullable();
            $table->timestamp('last_login')->nullable();
            $table->integer('forum_last_login')->nullable();
            $table->date('osa');
            $table->boolean('tos');
            $table->boolean('active');
            $table->text('note')->nullable();

            $table->json('duty_roster');
            $table->boolean('extra_padding');
            $table->boolean('has_events');
            $table->text('note')->nullable();
            $table->json('previous')->nullable();
            $table->text('unitPatchPath')->nullable();
            $table->text('usePeerageLands')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('suffix');
            $table->dropColumn('address1');
            $table->dropColumn('address2');
            $table->dropColumn('city');
            $table->dropColumn('state_province');
            $table->dropColumn('postal_code');
            $table->dropColumn('country');

            $table->dropColumn('dob');
            $table->dropColumn('application_date');
            $table->dropColumn('registration_date');
            $table->dropColumn('registration_status');
            $table->dropColumn('member_id');
            $table->dropColumn('promotionStatus');

            $table->dropColumn('branch');
            $table->dropColumn('rank');
            $table->dropColumn('rating');
            $table->dropColumn('path');

            $table->dropColumn('awards');
            $table->dropColumn('history');
            $table->dropColumn('assignment');
            $table->dropColumn('permissions');
            $table->dropColumn('lastUpdate');

            $table->dropColumn('previous_login');
            $table->dropColumn('last_login');
            $table->dropColumn('forum_last_login');
            $table->dropColumn('osa');
            $table->dropColumn('tos');
            $table->dropColumn('active');


            $table->string('name');
        });
    }
};
