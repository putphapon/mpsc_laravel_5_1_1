<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpscVdosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpsc_vdos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('vdo_name',100);
            $table->string('vdo_detail',100);
            $table->string('vdo_link',100);
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
        Schema::drop('mpsc_vdos');
    }
}
