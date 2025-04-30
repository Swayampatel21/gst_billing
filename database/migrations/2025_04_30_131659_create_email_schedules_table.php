<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailSchedulesTable extends Migration
{
    public function up()
    {
        Schema::create('email_schedules', function (Blueprint $table) {
            $table->id();
            $table->time('send_time');
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('email_schedules');
    }
}