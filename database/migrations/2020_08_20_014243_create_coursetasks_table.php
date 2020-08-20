<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursetasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursetasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courselesson_id')->unsigned();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('link')->nullable();
            $table->text('embed')->nullable();
            $table->string('video')->nullable();
            $table->string('audio')->nullable();
            $table->string('atachment')->nullable();
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('courselesson_id')->references('id')->on('courselessons')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursetasks');
    }
}
