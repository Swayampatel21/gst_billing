<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsRoleAndWelcomeEmailSentToUsers extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('is_role')->default('0')->after('password');
            $table->boolean('welcome_email_sent')->default(false)->after('is_role');
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['is_role', 'welcome_email_sent']);
        });
    }
}