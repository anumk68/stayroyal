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
    Schema::create('offers', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('room_type_id');
        $table->float('offer_price'); // percentage
        $table->string('offer_valid_time'); // like 1 week, 1 month
        $table->float('after_discount_price');
        $table->boolean('status')->default(1);
        $table->timestamps();

        $table->foreign('room_type_id')->references('id')->on('roomtypes')->onDelete('cascade');
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('offers');
    }
};
