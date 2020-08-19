<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('author_id')->unsigned();
            $table->string('title');
            $table->string('slug')->unique();
            $table->bigInteger('category_id')->unsigned();
            $table->text('excerpt');
            $table->text('content');
            $table->string('image')->nullable();
            $table->boolean('status');
            $table->integer('view_count')->default(0);
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('restrict');

            //create post_tag table
            Schema::create('post_tag', function (Blueprint $table) {
                $table->string('post_id');
                $table->string('tag_id');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_tag');
        Schema::dropIfExists('posts');
    }
}
