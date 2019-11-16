<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConfigureParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('configure_parameters', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('parameter_class_id');
            $table->bigInteger('product_id');
            $table->bigInteger('metric_id');

            // Values
            $table->string('name');
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
        Schema::dropIfExists('configure_parameters');
    }
}
