<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('classrooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('levelclass_id')->unsigned();
            $table->bigInteger('department_id')->unsigned();
            $table->string('complete_title')->unique();
            $table->string('short_title');
            $table->string('slug')->unique();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('levelclass_id')->references('id')->on('levelclasses')->onDelete('restrict');
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('classrooms');
    }
}
