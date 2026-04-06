<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $users = \App\Models\User::factory(10)
            ->has(\App\Models\Profile::factory())
            ->create();

        $this->call([
            ConditionsTableSeeder::class,
            CategoriesTableSeeder::class,
            ItemsTableSeeder::class,
            ItemCategoryTableSeeder::class
            ]);
    }
}
