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
    Schema::table('blogs', function (Blueprint $table) {
        $table->string('slug')->unique()->after('title');
        $table->text('short_description')->nullable()->after('description');
        $table->string('meta_title')->nullable()->after('short_description');
        $table->text('meta_description')->nullable()->after('meta_title');
        $table->text('meta_keyword')->nullable()->after('meta_description');
        $table->string('meta_image')->nullable()->after('image');
        $table->string('image_alt')->nullable()->after('meta_image');
    });
}

public function down(): void
{
    Schema::table('blogs', function (Blueprint $table) {
        $table->dropColumn([
            'slug',
            'short_description',
            'meta_title',
            'meta_description',
            'meta_keyword',
            'meta_image',
            'image_alt'
        ]);
    });
}

};
