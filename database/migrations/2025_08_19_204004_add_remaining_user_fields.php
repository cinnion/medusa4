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
            if (Schema::hasColumn('users', 'name')) {
                $table->dropColumn('name');
            }
            
            if (!Schema::hasColumn('users', 'first_name')) {
                $table->string('first_name');
            }
            if (!Schema::hasColumn('users', 'middle_name')) {
                $table->string('middle_name')->nullable();
            }
            if (!Schema::hasColumn('users', 'last_name')) {
                $table->string('last_name');
            }
            if (!Schema::hasColumn('users', 'suffix')) {
                $table->string('suffix')->nullable();
            }
            if (!Schema::hasColumn('users', 'address1')) {
                $table->string('address1');
            }
            if (!Schema::hasColumn('users', 'address2')) {
                $table->string('address2')->nullable();
            }
            if (!Schema::hasColumn('users', 'city')) {
                $table->string('city');
            }
            if (!Schema::hasColumn('users', 'state_province')) {
                $table->string('state_province');
            }
            if (!Schema::hasColumn('users', 'postal_code')) {
                $table->string('postal_code');
            }
            if (!Schema::hasColumn('users', 'country')) {
                $table->string('country');
            }
            if (!Schema::hasColumn('users', 'phone_number')) {
                $table->string('phone_number')->nullable();
            }

            if (!Schema::hasColumn('users', 'dob')) {
                $table->date('dob');
            }
            if (!Schema::hasColumn('users', 'application_date')) {
                $table->date('application_date');
            }
            if (!Schema::hasColumn('users', 'registration_date')) {
                $table->date('registration_date');
            }
            if (!Schema::hasColumn('users', 'registration_status')) {
                $table->string('registration_status');
            }
            if (!Schema::hasColumn('users', 'member_id')) {
                $table->string('member_id');
            }
            if (!Schema::hasColumn('users', 'idcard_printed')) {
                $table->boolean('idcard_printed')->nullable();
            }
            if (!Schema::hasColumn('users', 'promotionStatus')) {
                $table->boolean('promotionStatus');
            }
            if (!Schema::hasColumn('users', 'points')) {
                $table->json('points')->default(0);
            }

            if (!Schema::hasColumn('users', 'branch')) {
                $table->string('branch');
            }
            if (!Schema::hasColumn('users', 'rank')) {
                $table->json('rank');
            }
            if (!Schema::hasColumn('users', 'rating')) {
                $table->string('rating');
            }
            if (!Schema::hasColumn('users', 'path')) {
                $table->string('path');
            }

            if (!Schema::hasColumn('users', 'awards')) {
                $table->json('awards');
            }
            if (!Schema::hasColumn('users', 'history')) {
                $table->json('history');
            }
            if (!Schema::hasColumn('users', 'assignment')) {
                $table->json('assignment');
            }
            if (!Schema::hasColumn('users', 'permissions')) {
                $table->json('permissions');
            }
            if (!Schema::hasColumn('users', 'peerages')) {
                $table->json('peerages');
            }
            if (!Schema::hasColumn('users', 'lastUpdate')) {
                $table->unsignedBigInteger('lastUpdate');
            }

            if (!Schema::hasColumn('users', 'previous_login')) {
                $table->timestamp('previous_login')->nullable();
            }
            if (!Schema::hasColumn('users', 'last_login')) {
                $table->timestamp('last_login')->nullable();
            }
            if (!Schema::hasColumn('users', 'forum_last_login')) {
                $table->integer('forum_last_login')->nullable();
            }
            if (!Schema::hasColumn('users', 'osa')) {
                $table->date('osa');
            }
            if (!Schema::hasColumn('users', 'tos')) {
                $table->boolean('tos');
            }
            if (!Schema::hasColumn('users', 'active')) {
                $table->boolean('active');
            }
            if (!Schema::hasColumn('users', 'note')) {
                $table->text('note')->nullable();
            }

            if (!Schema::hasColumn('users', 'duty_roster')) {
                $table->json('duty_roster');
            }
            if (!Schema::hasColumn('users', 'extra_padding')) {
                $table->boolean('extra_padding');
            }
            if (!Schema::hasColumn('users', 'has_events')) {
                $table->boolean('has_events');
            }
            if (!Schema::hasColumn('users', 'note')) {
                $table->text('note')->nullable();
            }
            if (!Schema::hasColumn('users', 'previous')) {
                $table->json('previous')->nullable();
            }
            if (!Schema::hasColumn('users', 'unitPatchPath')) {
                $table->text('unitPatchPath')->nullable();
            }
            if (!Schema::hasColumn('users', 'usePeerageLands')) {
                $table->text('usePeerageLands')->nullable();
            }
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
