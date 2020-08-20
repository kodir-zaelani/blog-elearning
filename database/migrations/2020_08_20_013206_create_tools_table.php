<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tools', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('courselevelclassinstructur_id')->unsigned();
            $table->string('title');
            $table->string('link');
            $table->string('referenc')->nullable();
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->softDeletes;
            $table->timestamps();

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
        Schema::dropIfExists('tools');
    }
}
