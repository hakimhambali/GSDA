<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createanswertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('id_question');
            $table->text('answer');
            $table->text('answer_explanation');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return voida
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
