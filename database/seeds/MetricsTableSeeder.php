<?php

use Illuminate\Database\Seeder;

class MetricsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('metrics')->insert([
            'name' => '',
            'extended_name' => '',
        ]);
        DB::table('metrics')->insert([
            'name' => 'В.',
            'extended_name' => 'Вольты',
        ]);
        DB::table('metrics')->insert([
            'name' => 'Вт.',
            'extended_name' => 'Ватты',
        ]);
        DB::table('metrics')->insert([
            'name' => 'Стр.',
            'extended_name' => 'Страницы',
        ]);
        DB::table('metrics')->insert([
            'name' => 'Шт.',
            'extended_name' => 'Штуки',
        ]);
        DB::table('metrics')->insert([
            'name' => 'Кг.',
            'extended_name' => 'Киллограммы',
        ]);
        DB::table('metrics')->insert([
            'name' => 'М.',
            'extended_name' => 'Метры',
        ]);
    }
}
