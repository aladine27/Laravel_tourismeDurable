<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RemoveRouteFromLogistiqueCollectesTable extends Migration
{
    public function up()
    {
        Schema::table('logistique_collectes', function (Blueprint $table) {
            $table->dropColumn('route'); // Remove the route column
        });
    }

    public function down()
    {
        Schema::table('logistique_collectes', function (Blueprint $table) {
            $table->string('route')->nullable(); // Add the route column back if rolling back
        });
    }
}
