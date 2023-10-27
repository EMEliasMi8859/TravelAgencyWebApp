<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      
            Schema::create('b_categories', function (Blueprint $table) {
                $table->id();
                $table->integer('user_id');
                $table->string('category_name');
                $table->string('category_info');
                $table->timestamps();
                $table->SoftDeletes();
            });
     
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('b_categories');
    }
}
