<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpscScholarBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpsc_scholar_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('scholar_blog_name',100);
            $table->string('scholar_blog_author',100);
            $table->integer('scholar_category_id')->unsigned();
            $table->string('scholar_blog_link', 100);
            $table->timestamps();

            $table->foreign('scholar_category_id')
                    ->references('id')->on('mpsc_scholar_categories')
                    ->onDelete('restrict')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('mpsc_scholar_blogs');
    }
}
