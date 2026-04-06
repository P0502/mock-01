<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Category::create(['category' => 'ファッション']);
        \App\Models\Category::create(['category' => '家電']);
        \App\Models\Category::create(['category' => 'インテリア']);
        \App\Models\Category::create(['category' => 'レディース']);
        \App\Models\Category::create(['category' => 'メンズ']);
        \App\Models\Category::create(['category' => 'コスメ']);
        \App\Models\Category::create(['category' => '本']);
        \App\Models\Category::create(['category' => 'ゲーム']);
        \App\Models\Category::create(['category' => 'スポーツ']);
        \App\Models\Category::create(['category' => 'キッチン']);
        \App\Models\Category::create(['category' => 'ハンドメイド']);
        \App\Models\Category::create(['category' => 'アクセサリー']);
        \App\Models\Category::create(['category' => 'おもちゃ']);
        \App\Models\Category::create(['category' => 'ベビー・キッズ']);

    }
}
