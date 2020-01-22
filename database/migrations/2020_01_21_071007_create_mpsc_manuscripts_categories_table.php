<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpscManuscriptsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpsc_manuscripts_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manuscripts_category_name', 100);
            $table->string('manuscripts_category_detail', 255);
            $table->string('manuscripts_category_image', 100);
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
        Schema::drop('mpsc_manuscripts_categories');
    }
}
