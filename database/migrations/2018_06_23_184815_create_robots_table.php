<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRobotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('robots', function (Blueprint $table) {
            $table->increments('id');

            // $table->string('name');     //  name of the robot. Just for fun!

            // $table->integer('gridSizeX');
            // $table->integer('gridSizeY');
            
            $table->integer('sourceX');
            $table->integer('sourceY');
            
            $table->integer('destinationX');
            $table->integer('destinationY');
            
            $table->double('currLocX', 2);
            $table->double('currLocY', 2);
            
            $table->integer('orientation');

            $table->boolean('pathSet')->default(0); //  if the robot has recieved a path or not

            $table->boolean('started')->default(0); //  if the robot has started to move to the destination or not
            $table->boolean('reached')->default(0); //  if the robot has successfully reached the destination or not

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
        Schema::dropIfExists('robots');
    }
}
