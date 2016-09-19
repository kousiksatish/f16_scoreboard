<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropUniqueConstraint extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('scoreBoard', function (Blueprint $table) {
            $table->dropUnique( array('college_id','event') );
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
        Schema::table('scoreBoard', function (Blueprint $table) {
            $table->unique( array('college_id','event') );
        });
    }
}
