<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->unsigned();
            $table->string('title');
            $table->string('video')->nullable();
            $table->string('slug')->unique();
            $table->bigInteger('categorypage_id')->unsigned();
            $table->text('excerpt');
            $table->text('content');
            $table->string('image')->nullable();
            $table->boolean('status');
            $table->integer('view_count')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('categorypage_id')->references('id')->on('categorypages')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pages');
    }
}
