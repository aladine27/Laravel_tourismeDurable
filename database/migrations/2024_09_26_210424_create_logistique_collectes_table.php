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
        Schema::create('logistique_collectes', function (Blueprint $table) {
            $table->id();
            $table->string('chauffeur');
            $table->string('vehicle');
            $table->date('collect_date');
            $table->foreignId('transporteur_id')->constrained()->onDelete('cascade');
            $table->foreignId('departure_id')->constrained('locations')->onDelete('cascade');
            $table->foreignId('arrival_id')->constrained('locations')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logistique_collectes');
    }
};
