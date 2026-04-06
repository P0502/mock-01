<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $conditions = ['良好', '目立った傷や汚れなし', 'やや傷や汚れあり', '状態が悪い'];

        foreach ($conditions as $condition) {
            \App\Models\Condition::create(['condition' => $condition]);
        }
    }
}
