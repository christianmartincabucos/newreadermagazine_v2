<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('blog_id');
            $table->string('title');
            $table->string('pdf_book')->nullable();
            $table->string('cover_image');
            $table->bigInteger('category_id')->unsigned();
            $table->string('slug')->unique();
            $table->text('body');
            $table->text('meta_desc');
            $table->text('primary_key');
            $table->text('secondary_key');
            $table->bigInteger('author_id')->unsigned();
            $table->bigInteger('added_by')->unsigned();
            $table->bigInteger('reference_post_status')->unsigned();
            $table->bigInteger('status_id')->unsigned();

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
        Schema::dropIfExists('blogs');
    }
}
