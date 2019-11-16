<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductPositionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_positions', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('position_content_id');
            $table->bigInteger('valuable_id');
            $table->string('valuable_type');

            // Values
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
        Schema::dropIfExists('product_positions');
    }
}
