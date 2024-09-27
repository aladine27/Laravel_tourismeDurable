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
        Schema::table('logistique_collectes', function (Blueprint $table) {
            $table->string('departure')->nullable(); // Add departure column
            $table->string('arrival')->nullable();   // Add arrival column
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('logistique_collectes', function (Blueprint $table) {
            $table->dropColumn('departure'); // Drop departure column
            $table->dropColumn('arrival');   // Drop arrival column
        });
    }
};
