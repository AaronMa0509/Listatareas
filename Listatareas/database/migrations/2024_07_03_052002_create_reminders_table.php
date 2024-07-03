<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRemindersTable extends Migration
{
    public function up()
    {
        Schema::create('reminders', function (Blueprint $table) {
            $table->increments('reminder_id');
            $table->integer('task_id')->unsigned();
            $table->foreign('task_id')->references('task_id')->on('tasks');
            $table->dateTime('reminder_time');
            $table->boolean('sent')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reminders');
    }
}
