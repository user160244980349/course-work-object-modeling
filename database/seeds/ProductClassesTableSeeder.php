<?php

use Illuminate\Database\Seeder;

class ProductClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_classes')->insert([
            'name' => 'Материал',
            'terminal_in' => true,
            'terminal_out' => false,
        ]);
        DB::table('product_classes')->insert([
            'name' => 'Стандартное изделие',
            'terminal_in' => true,
            'terminal_out' => false,
        ]);
        DB::table('product_classes')->insert([
            'name' => 'Сборочная единица',
            'terminal_in' => false,
            'terminal_out' => false,
        ]);
        DB::table('product_classes')->insert([
            'name' => 'Оконченное изделие',
            'terminal_in' => false,
            'terminal_out' => true,
        ]);
    }
}
