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
            $table->string('nik');
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('birthplace')->nullable();
            $table->date('dateofbirth')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('no_wa')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('jabatan_dpc')->nullable();
            $table->enum('status_dprd', ['Ya', 'Tidak'])->default('Tidak');
            $table->string('jabatan_dprd')->nullable();
            $table->string('address')->nullable();
            $table->string('rt')->nullable();
            $table->string('district')->nullable();
            $table->string('vilage')->nullable();
            $table->string('city')->nullable();
            $table->string('postalcode')->nullable();
            $table->string('statuspeserta')->nullable();
            $table->string('image')->nullable();
            $table->bigInteger('event_id')->unsigned();
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
