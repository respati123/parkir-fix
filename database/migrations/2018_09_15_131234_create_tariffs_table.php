<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTariffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tariffs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_types_id')->unsigned();
            $table->integer('classes_id')->unsigned();
            $table->integer('nominal');
            $table->string('created_by',20);
            $table->string('created_at',20);
            $table->string('modified_by',20);
            $table->string('modified_at',20);

            $table->foreign('vehicle_types_id')
                ->references('id')
                ->on('vehicle_types')
                ->onDelete('cascade');

            $table->foreign('classes_id')
                ->references('id')
                ->on('classes')
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
        Schema::dropIfExists('tariffs');
    }
}
