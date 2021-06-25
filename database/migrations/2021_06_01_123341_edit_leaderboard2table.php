<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EditLeaderboard2table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaderboards', function (Blueprint $table) {
       
            $table->text('quiz_name');
       
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaderboards', function (Blueprint $table) {
       
            $table->dropColumn('quiz_name');
       
        });
    }
}
