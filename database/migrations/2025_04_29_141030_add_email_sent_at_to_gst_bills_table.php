<?php

   use Illuminate\Database\Migrations\Migration;
   use Illuminate\Database\Schema\Blueprint;
   use Illuminate\Support\Facades\Schema;

   class AddEmailSentAtToGstBillsTable extends Migration
   {
       public function up()
       {
           Schema::table('gst_bills', function (Blueprint $table) {
               $table->timestamp('email_sent_at')->nullable()->after('is_email_sent');
           });
       }

       public function down()
       {
           Schema::table('gst_bills', function (Blueprint $table) {
               $table->dropColumn('email_sent_at');
           });
       }
   }