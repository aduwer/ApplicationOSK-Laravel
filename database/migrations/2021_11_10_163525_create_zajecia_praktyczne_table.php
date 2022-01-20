<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateZajeciaPraktyczneTable extends Migration
{
    /**
     * Run the migrations.
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('practice_lessons', function (Blueprint $table) {
            $table->id();
            
            // $table->unsignedBigInteger('kursant_id');
            // $table->foreign('kursant_id')
            //         ->references('id')->on('users')
            //         ->onDelete('cascade');
            $table->date('data');
            $table->string('start_time');
            $table->string('end_time');
            $table->string('place');
            $table->string('category');
            $table->string('status',5)->nullable();
            $table->unsignedBigInteger('instructor_id');
            $table->string('driveStatus')->default('absent');
            // $table->unsignedBigInteger('instruktor_id')
            //         ->foreign('instruktor_id')
            //         ->references('id')->on('users')
            //         ->onDelete('cascade');
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
        Schema::dropIfExists('practice_lessons');
    }
}
