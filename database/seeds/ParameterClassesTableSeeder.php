<?php

use Illuminate\Database\Seeder;

class ParameterClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('parameter_classes')->insert([
            'name' => 'Описательный',
        ]);
        DB::table('parameter_classes')->insert([
            'name' => 'Конфигурационный',
        ]);
    }
}
