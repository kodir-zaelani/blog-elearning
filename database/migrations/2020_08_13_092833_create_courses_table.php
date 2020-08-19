<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('levelclass_id')->unsigned();
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('categorycourse_id')->unsigned();
            $table->string('level')->nullable();
            $table->string('image')->nullable();
            $table->string('video_peview')->nullable();
            $table->string('descriptions');
            $table->string('keywords');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('levelclass_id')->references('id')->on('levelclasses')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
