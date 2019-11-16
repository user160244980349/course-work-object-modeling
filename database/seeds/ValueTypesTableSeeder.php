<?php

use Illuminate\Database\Seeder;

class ValueTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('value_types')->insert([
            'name' => 'Строковый',
            'value_model' => 'App\Models\ParameterValues\StringValue',
        ]);
        DB::table('value_types')->insert([
            'name' => 'Целочисленный',
            'value_model' => 'App\Models\ParameterValues\IntegerValue',
        ]);
        DB::table('value_types')->insert([
            'name' => 'Вещественный',
            'value_model' => 'App\Models\ParameterValues\RealValue',
        ]);
    }
}
