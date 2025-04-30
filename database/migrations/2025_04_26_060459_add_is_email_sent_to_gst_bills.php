<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsEmailSentToGstBills extends Migration
{
    public function up()
    {
        Schema::table('gst_bills', function (Blueprint $table) {
            $table->boolean('is_email_sent')->default(false)->after('declaration');
        });
    }

    public function down()
    {
        Schema::table('gst_bills', function (Blueprint $table) {
            $table->dropColumn('is_email_sent');
        });
    }
}