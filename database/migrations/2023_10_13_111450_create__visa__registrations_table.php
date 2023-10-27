<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVisaRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visa_registrations', function (Blueprint $table) {

            $table->id();
            $table->Integer('CustomerID');
            $table->string('full_name');
            $table->string('email');
            $table->integer('phone_number');
            $table->date('departure_date');
            $table->date('return_date');
            $table->decimal('Amount', 15,2);
            $table->string('Country');
            $table->decimal('VisaPrice', 15,2);
            $table->decimal('TiketPrice', 15,2);
            $table->decimal('OtherExpenses', 15,2);
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
        Schema::dropIfExists('visa_registrations');
    }
}
