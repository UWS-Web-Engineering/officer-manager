<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Offers extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('cropid')->foreign('cropid')->references('id')->on('crops');
            $table->unsignedBigInteger('farmerid')->foreign('farmerid')->references('id')->on('farmers');
            $table->float('cropprice')->nullable();
            $table->integer('cropqty')->nullable();
            $table->string('expecteddate')->nullable();
            $table->unsignedBigInteger('officerid')->foreign('officerid')->references('id')->on('officers');
            $table->integer('rejected')->nullable();
            $table->integer('negotiation')->nullable();
            //$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
