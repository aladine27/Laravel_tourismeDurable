<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('trip_traveler', function (Blueprint $table) {
            $table->foreignId('traveler_id')->constrained()->onDelete('cascade');
            $table->foreignId('trip_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('trip_traveler', function (Blueprint $table) {
            $table->dropForeign(['traveler_id']);
            $table->dropForeign(['trip_id']);
            $table->dropColumn(['traveler_id', 'trip_id']);
        });
    }
};
