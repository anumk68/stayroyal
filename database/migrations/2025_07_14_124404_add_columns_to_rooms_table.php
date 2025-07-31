<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->json('amenities')->nullable(); // JSON to store icon-text pairs
      
        $table->float('rating')->nullable();
        $table->integer('rating_count')->default(0);
        $table->dateTime('check_in')->nullable();
        $table->dateTime('check_out')->nullable();
        $table->json('room_images')->nullable(); // multiple image support
        $table->boolean('status')->default(true);
    });
}

public function down()
{
    Schema::table('rooms', function (Blueprint $table) {
        $table->dropColumn([
            'amenities', 'rating', 'rating_count', 'check_in', 'check_out', 'room_images', 'status'
        ]);
    });
}

};
