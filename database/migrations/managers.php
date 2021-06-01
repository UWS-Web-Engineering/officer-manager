<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class Managers extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
       Schema::create('managers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('companyname')->nullable();
            $table->string('managername')->nullable();
            $table->string('manageremail')->nullable();
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
        Schema::dropIfExists('managers');
    }
}
