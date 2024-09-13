<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EpBlogTable extends Migration
{
    public function up()
    {
        Schema::create('ep_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // foreign key
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->integer('pageview')->default(0);
            $table->text('keyword');
            $table->timestamps();

            // Set up foreign key constraint
            $table->foreign('category_id')->references('id')->on('ep_category')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ep_blog');
    }
}
