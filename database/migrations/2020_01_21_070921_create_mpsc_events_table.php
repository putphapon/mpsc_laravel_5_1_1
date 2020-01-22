<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpscEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpsc_events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('events_name',100);
            $table->string('events_image',100);
            $table->date('events_date');
            $table->string('events_where',100);
            $table->string('events_linkReg',100);
            $table->string('events_linkImage',100);
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
        Schema::drop('mpsc_events');
    }
}
