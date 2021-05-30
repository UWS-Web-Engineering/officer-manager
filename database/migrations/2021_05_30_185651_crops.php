<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Crops extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->increments('id');
            $table->string('cropname')->nullable();
            $table->string('cropimg')->nullable();
            $table->float('cropprice')->nullable();
            $table->integer('cropqty')->nullable();
            $table->string('expecteddate')->nullable();
            $table->integer('cropstatus')->nullable();
            $table->unsignedBigInteger('officerid')->foreign('officerid')->references('id')->on('officers');
            $table->unsignedBigInteger('farmerid')->foreign('farmerid')->references('id')->on('farmers')->nullable();
            $table->integer('regionid')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('crops');
    }
}
