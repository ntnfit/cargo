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
        Schema::create('mawb', function (Blueprint $table) {
            $table->id();
            $table->string('route',254);
            $table->string('master',254);
            $table->string('destination',254);
            $table->string('value',254);
            $table->text('note');
            $table->date('shipdate');
            $table->string('no',254);
            $table->string('airline',254);
            $table->string('flight_no',254);
            $table->date('flight_departure_date');
            $table->string('flight_from_city',254);
            $table->string('connect_flight_no',254);
            $table->date('connect_flight_departure_date');
            $table->string('connect_light_departure_from:',254);
            $table->string('airport',254);
            $table->string('destination_city',254);
            $table->string('destination_country',254);
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
        Schema::dropIfExists('mawb');
    }
};
