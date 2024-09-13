<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EpSlideTable extends Migration
{
    public function up()
    {
        Schema::create('ep_slide', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('content');
            $table->string('image');
            $table->string('link')->nullable(); // nullable link
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ep_slide');
    }
}
