<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('event_id')->unsigned();
            $table->string('nik');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('birthplace');
            $table->text('dateofbirth');
            $table->string('image')->nullable();
            $table->string('no_hp');
            $table->string('no_wa');
            $table->string('email')->unique();
            $table->string('jabatan_dpc');
            $table->boolean('status_dprd')->default(false);
            $table->string('jabatan_dprd');
            $table->string('rt');
            $table->string('district');
            $table->string('vilage');
            $table->string('city');
            $table->string('postalcode');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('event_id')->references('id')->on('events')->onDelete('restrict');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('participants');
    }
}
