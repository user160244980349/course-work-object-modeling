<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePredicateInstancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('predicate_instances', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('product_id');
            $table->bigInteger('product_position_id');
            $table->bigInteger('predicate_id');

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
        Schema::dropIfExists('predicate_instances');
    }
}
