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
<<<<<<< Updated upstream:database/migrations/2024_09_27_100313_create_guides_table.php
        Schema::create('guides', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
=======
        Schema::table('trip_travelers', function (Blueprint $table) {
            $table->unsignedBigInteger('traveler_id')->nullable(false);
            $table->unsignedBigInteger('trip_id')->nullable(false);
>>>>>>> Stashed changes:database/migrations/2024_10_16_110403_rename_trip_traveler_to_trip_travelers.php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
<<<<<<< Updated upstream:database/migrations/2024_09_27_100313_create_guides_table.php
        Schema::dropIfExists('guides');
=======
        Schema::table('trip_travelers', function (Blueprint $table) {
            $table->dropColumn(['traveler_id', 'trip_id']);
        });
>>>>>>> Stashed changes:database/migrations/2024_10_16_110403_rename_trip_traveler_to_trip_travelers.php
    }
};
