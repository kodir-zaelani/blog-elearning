<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourselessonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courselessons', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courselevelclassinstructur_id')->unsigned();
            $table->bigInteger('coursesection_id')->unsigned();
            $table->string('title');
            $table->string('content');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('courselevelclassinstructur_id')->references('id')->on('courselevelclassinstructurs')->onDelete('restrict');
            $table->foreign('coursesection_id')->references('id')->on('coursesections')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courselessons');
    }
}
