<?php

use Illuminate\Database\Seeder;

class DocumentClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('document_classes')->insert([
            'name' => 'Чертеж',
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Схема',
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Сборочный чертеж',
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Документация',
        ]);
        DB::table('document_classes')->insert([
            'name' => '3D-модель',
        ]);
    }
}
