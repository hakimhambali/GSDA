<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditAttemptquiztable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('attempt_quizzes', function (Blueprint $table) {
       
            $table->dropColumn('name');
            $table->dropColumn('file_path');
            $table->dropColumn('file_name');
       
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
       
            $table->text('name')->nullable();
            $table->text('file_path')->nullable();
            $table->text('file_name')->nullable();
       
        });
    }
}
