<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignToBlogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->foreign('author_id')->references('author_id')->on('authors');
            $table->foreign('added_by')->references('id')->on('users');
            $table->foreign('reference_post_status')->references('reference_id')->on('references');
            $table->foreign('status_id')->references('reference_id')->on('references');
            $table->foreign('category_id')->references('reference_id')->on('references');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('blogs', function (Blueprint $table) {
            //
        });
    }
}
