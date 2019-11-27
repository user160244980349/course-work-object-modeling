<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFormalParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('formal_parameters', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('predicate_instance_id');
            $table->bigInteger('configure_parameter_id');
            $table->bigInteger('configure_string_id');

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
        Schema::dropIfExists('formal_parameters');
    }
}
