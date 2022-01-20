<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('privilege',['user','admin','instructor']);
            $table->string('firstName');
            $table->string('secondName')->nullable();
            $table->string('lastName');
            $table->string('province');
            $table->string('town');
            $table->string('postCode');
            $table->string('street');
            $table->string('houseNumber');
            $table->string('flatNumber')->nullable();
            $table->string('phone');
            $table->string('pesel')->unique();
            $table->string('pkkNumber')->nullable()->unique();
            $table->string('licenceNumber')->nullable()->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
