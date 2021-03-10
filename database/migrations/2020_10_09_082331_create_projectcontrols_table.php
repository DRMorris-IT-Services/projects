<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectControlsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projectcontrols', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('project_admin')->nullable();
            $table->string('project_view')->nullable();
            $table->string('project_add')->nullable();
            $table->string('project_edit')->nullable();
            $table->string('project_download')->nullable();
            $table->string('project_del')->nullable();
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
        Schema::dropIfExists('projectcontrols');
    }
}
