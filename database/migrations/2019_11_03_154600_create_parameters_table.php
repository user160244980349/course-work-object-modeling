<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {

            // Indices
            $table->bigIncrements('id');
            $table->bigInteger('parameter_class_id');
            $table->bigInteger('parameter_type_id');
            $table->bigInteger('parametrized_id');
            $table->bigInteger('valuable_id');
            $table->string('valuable_type');
            $table->string('parametrized_type');
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
        Schema::dropIfExists('parameters');
    }
}
