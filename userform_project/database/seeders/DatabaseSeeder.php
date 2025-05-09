<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Добавляем сидер для продуктов
        $this->call([
            ProductsSeeder::class,
        ]);
    }
}
