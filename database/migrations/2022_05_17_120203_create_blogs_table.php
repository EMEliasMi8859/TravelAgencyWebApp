<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->String('title');
            $table->String('content');
            $table->foreignId('b_category_id')->constrained()->onDelete("cascade")->onUpdate('cascade');
            $table->foreignId('user_id');
            $table->String('blog_pic');
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
        //
    }
}
