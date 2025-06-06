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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

           $table->unsignedBigInteger('room_id')->nullable();
           $table->foreign('room_id')->references('id')->on('rooms')->onDelete('set null');

           $table->decimal('amount');
           $table->string('currency')->default('USD');
           $table->string('payment_method');
           $table->string('transaction_id')->nullable();
           $table->string('status')->default('pending'); 
           $table->timestamp('paid_at')->nullable();
           $table->text('notes')->nullable();
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
