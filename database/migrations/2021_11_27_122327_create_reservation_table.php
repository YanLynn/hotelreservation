<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */


    public function up()
    {
        Schema::create('reservation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('f_name');
            $table->string('l_name');
            $table->string('address');
            $table->integer('zipcode');
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->integer('phone');
            $table->date('checkInDate');
            $table->date('checkOutDate');
            $table->string('checkInTime');
            $table->string('checkOutTime');
            $table->integer('forAdults');
            $table->integer('forChildren');
            $table->integer('numOfRooms');
            $table->string('roomTypeOne');
            $table->string('roomTypeTow');
            $table->string('specialInstructions');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservation');
    }
}
