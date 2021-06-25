<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditCreatequiztable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('create_quizzes', function (Blueprint $table) {
       
            $table->integer('hour');
            $table->integer('minute');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('create_quizzes', function (Blueprint $table) {
       
            $table->dropColumn('hour');
            $table->dropColumn('minute');
       
        });
    }
}
