<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTraversalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('traversals', function (Blueprint $table) {
            $table->increments('id');

            $table->double('currLocX', 2);
            $table->double('currLocY', 2);
            $table->integer('orientation');
            $table->string('command');
            $table->string('nodeType');

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
        Schema::dropIfExists('traversals');
    }
}
