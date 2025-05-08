<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (!Schema::hasColumn('users', 'is_role')) {
                $table->string('is_role')->default('user')->after('password');
            }
            if (!Schema::hasColumn('users', 'welcome_email_sent')) {
                $table->boolean('welcome_email_sent')->default(false)->after('is_role');
            }
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumn('users', 'is_role')) {
                $table->dropColumn('is_role');
            }
            if (Schema::hasColumn('users', 'welcome_email_sent')) {
                $table->dropColumn('welcome_email_sent');
            }
        });
    }
};