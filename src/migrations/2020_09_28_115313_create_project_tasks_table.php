<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('project_tasks', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('project_id');
            $table->string('client_id');
            $table->date('start_date')->nullable();
            $table->date('due_date')->nullable();
            $table->string('task_summary')->nullable();
            $table->string('task_description')->nullable();
            $table->string('task_percent_completed')->nullable();
            $table->string('assigned_user_id')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('project_tasks');
    }
}
