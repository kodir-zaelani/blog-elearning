<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourselessoncompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courselessoncompletes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courselevelclassinstructur_id')->unsigned();
            $table->bigInteger('coursesection_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();
        
            $table->foreign('courselevelclassinstructur_id')->references('id')->on('courselevelclassinstructurs')->onDelete('restrict');
            $table->foreign('coursesection_id')->references('id')->on('coursesections')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courselessoncompletes');
    }
}
