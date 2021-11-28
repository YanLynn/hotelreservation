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
            $table->string('zipcode');
            $table->string('email');
            $table->string('city');
            $table->string('state');
            $table->string('phone');
            $table->date('checkInDate');
            $table->date('checkOutDate');
            $table->string('checkInTime')->nullable();
            $table->string('checkOutTime')->nullable();
            $table->integer('forAdults')->nullable();
            $table->integer('forChildren')->nullable();
            $table->integer('numOfRooms')->nullable();
            $table->string('roomTypeOne')->nullable();
            $table->string('roomTypeTow')->nullable();
            $table->string('specialInstructions')->nullable();
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
