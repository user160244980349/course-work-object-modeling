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
            'name' => 'Документация',
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Чертеж',
            'parent_id' => 1,
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Схема',
            'parent_id' => 1,
        ]);
        DB::table('document_classes')->insert([
            'name' => 'Сборочный чертеж',
            'parent_id' => 1,
        ]);
        DB::table('document_classes')->insert([
            'name' => '3D-модель',
            'parent_id' => 1,
        ]);
    }
}
