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
        Schema::create('ep_deal', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('branch_id'); // Foreign key ke ep_branch
            $table->string('car_brand')->nullable(); // Merek mobil
            $table->string('car_type')->nullable(); // Jenis mobil
            $table->string('title');
            $table->string('slug');
            $table->date('deal_date');
            $table->string('deal_type'); // Ganti enum menjadi string
            $table->string('image');
            $table->text('keyword');
            $table->longText('content')->nullable();
            $table->timestamps();

            // Setup foreign key relationship
            $table->foreign('branch_id')->references('id')->on('ep_branch')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ep_deal');
    }
};
