<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePredicateProductPositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predicate_product_position', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('predicate_id');
            $table->bigInteger('product_position_id');

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
        Schema::dropIfExists('predicate_product_position');
    }
}
