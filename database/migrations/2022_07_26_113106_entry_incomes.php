<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EntryIncomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_incomes', function (Blueprint $table) {
            $table->id();
            $table->string('applicant_name');
            $table->string('amount');
            $table->integer('user_id');
            $table->timestamps();
            $table->SoftDeletes();
            $table->string('date');
            $table->string('status');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entry_incomes');
    }
}
