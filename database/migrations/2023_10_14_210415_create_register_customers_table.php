<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegisterCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('register_customers', function (Blueprint $table) {
            $table->id();
            $table->string('Name');
            $table->string('LastName');
            $table->string('FatherName');
            $table->integer('Phone');
            $table->string('Email');
            $table->string('Province');
            $table->string('District');
            $table->string('IDCard');
            $table->string('Passport');
            $table->string('Picture');
            $table->date('Date');
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
        Schema::dropIfExists('register_customers');
    }
}
