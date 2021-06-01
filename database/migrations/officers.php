<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Officers extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('officers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('managerid')->foreign('managerid')->references('id')->on('managers');
            $table->string('officername')->nullable();
            $table->string('email')->nullable();
            $table->integer('usercontrollerid')->nullable();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('officers');
    }
}
