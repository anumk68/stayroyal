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
        Schema::create('metas', function (Blueprint $table) {
            $table->id();
                $table->string('meta_title');
                $table->text('value');
                $table->unsignedBigInteger('meta_type_id');

                $table->foreign('meta_type_id')
                ->references('id')
                ->on('metatypes')  // ✅ Use correct table name
               ->onDelete('cascade');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metas');
    }
};
