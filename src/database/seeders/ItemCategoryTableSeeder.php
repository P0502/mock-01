<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $itemCategories = [
            1 => [1, 12, 5],   // 腕時計 → ファッション, アクセサリー, メンズ
            2 => [2, 8],       // HDD → 家電, ゲーム
            3 => [10],         // 玉ねぎ3束 → キッチン
            4 => [1, 5],       // 靴 → ファッション, メンズ
            5 => [2],          // ノートPC → 家電
            6 => [2],          // マイク → 家電
            7 => [1, 4],       // ショルダーバッグ → ファッション, レディース
            8 => [10, 3],      // タンブラー → キッチン + インテリア(3)
            9 => [10, 3],      // コーヒー豆 → キッチン + インテリア(3)
            10 => [6, 4],      // メイクセット → コスメ, レディース
        ];

        foreach ($itemCategories as $itemId => $categoryIds) {
            foreach ($categoryIds as $categoryId) {
                DB::table('item_category')->insert([
                    'item_id' => $itemId,
                    'category_id' => $categoryId,
                ]);
            }
        }
    }
}
