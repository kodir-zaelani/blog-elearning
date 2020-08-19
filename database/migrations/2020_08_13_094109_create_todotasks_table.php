<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodotasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todotasks', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('lesson_id');
            $table->string('title');
            $table->string('content')->nullable();
            $table->text('embed')->nullable();
            $table->string('link')->nullable();
            $table->string('atachment')->nullable();
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
        Schema::dropIfExists('todotasks');
    }
}
