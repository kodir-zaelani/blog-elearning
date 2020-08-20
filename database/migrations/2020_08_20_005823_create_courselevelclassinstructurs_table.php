<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourselevelclassinstructursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courselevelclassinstructurs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courselevelclass_id');
            $table->bigInteger('user_id');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->string('video_preview')->nullable();
            $table->string('description');
            $table->softDeletes;
            $table->timestamps();

            $table->foreign('courselevelclass_id')->references('id')->on('courselevelclasses')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('instructurs')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courselevelclassinstructurs');
    }
}
