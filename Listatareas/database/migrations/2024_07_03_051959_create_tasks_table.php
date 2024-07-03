<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->increments('task_id');
            $table->unsignedBigInteger('user_id'); // Mismo tipo que la columna 'id' en 'users'
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->text('description')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->enum('priority', ['Low', 'Medium', 'High'])->default('Low');
            $table->enum('status', ['Pending', 'In Progress', 'Completed'])->default('Pending');
            $table->integer('progress')->default(0);
            $table->timestamps();
        });        
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
