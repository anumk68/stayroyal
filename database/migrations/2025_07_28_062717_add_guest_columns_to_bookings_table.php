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
    Schema::table('bookings', function (Blueprint $table) {
        $table->unsignedTinyInteger('adults')->default(1)->after('total_days');
        $table->unsignedTinyInteger('children')->default(0)->after('adults');
        $table->unsignedTinyInteger('infants')->default(0)->after('children');
        $table->unsignedTinyInteger('extra_beds')->default(0)->after('infants');
    });
}

public function down()
{
    Schema::table('bookings', function (Blueprint $table) {
        $table->dropColumn(['adults', 'children', 'infants', 'extra_beds']);
    });
}


};
