<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToMpscContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mpsc_contacts', function (Blueprint $table) {
            $table->string('contact_name',500);
            $table->string('contact_address',500);
            $table->string('contact_phone',100);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mpsc_contacts', function (Blueprint $table) {
            //
        });
    }
}
