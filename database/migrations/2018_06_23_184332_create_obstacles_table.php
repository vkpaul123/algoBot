<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateObstaclesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('obstacles', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('xLocation');   //  row-location of the obstacle
            $table->integer('yLocation');   //  column-location of the obstacle

            $table->integer('robot_id');

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
        Schema::dropIfExists('obstacles');
    }
}
