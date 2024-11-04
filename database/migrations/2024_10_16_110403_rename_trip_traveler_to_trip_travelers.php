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
        Schema::table('trip_travelers', function (Blueprint $table) {
            Schema::rename('trip_traveler', 'trip_travelers'); // Rename the table
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::rename('trip_travelers', 'trip_traveler'); // Reverse the rename
    }
};
