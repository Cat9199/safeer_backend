<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTravelRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_ratings', function (Blueprint $table) {
            $table->integer('ratings',false,true)->nullable();
            $table->longText('message')->nullable();
            $table->integer('travel_id',false,true);
            $table->integer('user_id',false,true);
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
        Schema::dropIfExists('travel_ratings');
    }
}
