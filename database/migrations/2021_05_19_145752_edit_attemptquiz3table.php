<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAttemptquiz3table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attempt_quizzes', function (Blueprint $table) {
       
            $table->integer('id_question');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attempt_quizzes', function (Blueprint $table) {
       
            $table->dropColumn('id_question');
       
        });
    }
}
