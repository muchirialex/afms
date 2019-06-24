<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('client_name');
            $table->string('contact_person');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('vehicle_make');
            $table->string('vehicle_model');
            $table->string('registration_number');
            $table->string('engine_number');
            $table->string('chassis_number');
            $table->string('gadget_type');
            $table->string('condition');
            $table->string('serial');
            $table->string('warranty');
            $table->string('issue_date');
            $table->string('validity');
            $table->string('expiry_date');
            $table->string('installer');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vehicles');
    }
}
