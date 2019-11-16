<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([

            UsersTableSeeder::class,
            ProductClassesTableSeeder::class,
            DocumentClassesTableSeeder::class,
            ParameterClassesTableSeeder::class,
            ValueTypesTableSeeder::class,
            MetricsTableSeeder::class,
            ParametersTableSeeder::class,
            DocumentsTableSeeder::class,
            StringValuesTableSeeder::class,
            IntegerValuesTableSeeder::class,

        ]);
    }
}
