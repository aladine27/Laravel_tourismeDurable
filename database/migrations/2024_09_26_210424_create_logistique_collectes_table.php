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
            $table->id(); // Auto-incrementing primary key
            $table->string('chauffeur'); // Column for chauffeur name
            $table->string('vehicle'); // Column for vehicle details
            $table->string('route'); // Column for route details
            $table->date('collect_date'); // Column for collection date
            $table->foreignId('transporteur_id')->constrained()->onDelete('cascade'); // Foreign key for transporteur
            $table->timestamps(); // Created at and updated at timestamps
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
