<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeTagToManuscriptsBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('mpsc_manuscripts_blogs', function (Blueprint $table) {
            //
            $table->string('manuscripts_blog_tag',255)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mpsc_manuscripts_blogs', function (Blueprint $table) {
            //
        });
    }
}
