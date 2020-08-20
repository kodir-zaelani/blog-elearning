<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseclassroomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseclassrooms', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('classroom_id')->unsigned();
            $table->bigInteger('courselevelclassinstructur_id')->unsigned();
            $table->string('description');
            $table->string('code')->unique();
            $table->string('slug')->unique();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('courselevelclassinstructur_id')->references('id')->on('courselevelclassinstructurs')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseclassrooms');
    }
}
