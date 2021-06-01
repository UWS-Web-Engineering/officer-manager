<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Farmers extends Migration
{
     /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('farmers', function (Blueprint $table) {

            $table->increments('id');
            $table->string('farmeremail')->nullable();
            $table->string('farmername')->nullable();
            $table->string('farmerphone')->nullable();
            $table->string('farmerAddress')->nullable();
            $table->integer('usercontrollerid')->nullable();
            $table->integer('regionId')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('farmers');
    }
}