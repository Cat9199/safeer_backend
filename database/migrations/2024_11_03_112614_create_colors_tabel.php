<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors_table', function (Blueprint $table) {
            $table->id();
            $table->string('name');  // Color name
            $table->string('hex_code');  // HEX code for the color
            $table->enum('material', ['Matte', 'Shiny']);  // Material finish
            $table->foreignId('product_id')->constrained()->onDelete('cascade');  // Assuming you have a `products` table
            $table->json('image_ids');  // Array of image IDs as a JSON field
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
        Schema::dropIfExists('colors_table');
    }
}