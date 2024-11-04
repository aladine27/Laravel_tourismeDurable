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
          Schema::create('bookings', function (Blueprint $table) {
              $table->id();
              $table->date('check_in_date');
              $table->date('check_out_date');
              $table->integer('total_price');
              $table->foreignId('accommodation_id')->constrained()->onDelete('cascade')->onUpdate('cascade');
              $table->timestamps();
          });
      }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
