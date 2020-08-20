<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursestudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursestudents', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courseclassroom_id')->unsigned();
            $table->bigInteger('user_id')->unsigned();
            $table->timestamps();

            $table->foreign('courseclassroom_id')->references('id')->on('courseclassrooms')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('students')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursestudents');
    }
}
