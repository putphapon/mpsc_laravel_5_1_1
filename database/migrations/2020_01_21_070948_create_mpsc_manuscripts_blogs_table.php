<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpscManuscriptsBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpsc_manuscripts_blogs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('manuscripts_blog_name',100);
            $table->string('manuscripts_blog_detail',255);
            $table->string('manuscripts_blog_image',100);
            $table->integer('manuscripts_category_id')->unsigned();
            $table->string('manuscripts_blog_tag',100);
            $table->string('manuscripts_blog_link',100);
            $table->timestamps();

            $table->foreign('manuscripts_category_id')
                    ->references('id')->on('mpsc_manuscripts_categories')
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
        Schema::drop('mpsc_manuscripts_blogs');
    }
}
