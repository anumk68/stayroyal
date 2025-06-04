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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('room_type');
            $table->string('location')->nullable();
            $table->string('price');
             $table->string('size');
            $table->date('start_date'); // changed from string() to date()
            $table->date('end_date');   // changed from string() to date()
            $table->string('total_days')->nullable();
            $table->timestamps();
        });
    }
  
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
