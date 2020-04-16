<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('categories_id')->unsigned()->default(0);
            $table->integer('user_id')->unsigned();
            $table->string('img')->nullable();
            $table->string('slug')->unique();
            $table->string('title');
            $table->text('excerpt')->nullable();
            $table->text('content');
            $table->boolean('is_published')->default(false);
            $table->timestamp('published_ad')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('categories_id')->references('id')->on('news_categories');
            $table->index('is_published');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
