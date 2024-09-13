<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpDealTable extends Migration
{
    public function up()
    {
        Schema::create('ep_deal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); // Foreign key ke ep_branch
            $table->string('title');
            $table->string('slug');
            $table->date('deal_date');
            $table->enum('deal_type', ['Mobil Bekas', 'Mobil Baru', 'Rumah', 'Tanah', 'Ruko']);
            $table->string('image');
            $table->text('keyword');
            $table->longText('content')->nullable();
            $table->timestamps();

            // Setup foreign key relationship
            $table->foreign('branch_id')->references('id')->on('ep_branch')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ep_deal');
    }
}
