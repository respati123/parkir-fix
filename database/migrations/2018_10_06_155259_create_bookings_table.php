<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('no_order');
            $table->integer('user_id')->unsigned();
            $table->integer('building_id')->unsigned();
            $table->integer('areas_id')->unsigned();
            $table->integer('vehicle_users_id')->unsigned();
            $table->integer('types_pay_id')->unsigned();
            $table->integer('voucher_id')->unsigned()->nullable();
            $table->string('status');
            $table->dateTime('booking_time');
            $table->dateTime('start_time_parking');
            $table->dateTime('end_time_parking');
            $table->integer('total');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('building_id')
                ->references('id')
                ->on('buildings')
                ->onDelete('cascade');
            $table->foreign('areas_id')
                ->references('id')
                ->on('areas')
                ->onDelete('cascade');
            $table->foreign('vehicle_users_id')
                ->references('id')
                ->on('vehicle_users')
                ->onDelete('cascade');
            $table->foreign('types_pay_id')
                ->references('id')
                ->on('types_pays')
                ->onDelete('cascade');
            $table->foreign('voucher_id')
                ->references('id')
                ->on('vouchers')
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
        Schema::dropIfExists('bookings');
    }
}
