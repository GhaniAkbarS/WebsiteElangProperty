<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpDealPhotoTable extends Migration
{
    public function up()
    {
        Schema::create('ep_deal_photo', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('deal_id'); // Foreign key ke ep_deal
            $table->string('image');
            $table->timestamps();

            // Setup foreign key relationship
            $table->foreign('deal_id')->references('id')->on('ep_deal')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ep_deal_photo');
    }
};
