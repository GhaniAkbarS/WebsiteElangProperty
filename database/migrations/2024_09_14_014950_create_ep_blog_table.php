<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ep_blog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id'); // foreign key
            $table->foreign('category_id')->references('id')->on('ep_category');
            $table->string('title');
            $table->string('slug');
            $table->string('image')->nullable();
            $table->text('excerpt')->nullable();
            $table->longText('content');
            $table->enum('status', ['publish', 'draft'])->default('draft');
            $table->integer('pageview')->default(0);
            $table->text('keyword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ep_blog');
    }
};
