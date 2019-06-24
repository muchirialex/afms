<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMoreInfoToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table){
            $table->string('identification');
            $table->string('city');
            $table->string('country')->default('Kenya');
            $table->string('postalcode');
            $table->string('twitter');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table){
            $table->string('identification');
            $table->string('city');
            $table->string('country');
            $table->string('postalcode');
            $table->dropColumn('twitter');
        });
    }
}
