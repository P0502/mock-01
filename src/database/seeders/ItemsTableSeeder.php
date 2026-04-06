<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userIds = \App\Models\User::pluck('id');

        if ($userIds->isEmpty()) {
            return; // または例外
        }

        DB::table('items')->insert(
            [
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 1, // 良好
                    'name' => '腕時計',
                    'price' => 15000,
                    'brand' => 'Rolax',
                    'image' => 'items/watch.png',
                    'description' => 'スタイリッシュなデザインのメンズ腕時計'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 2, // 目立った傷や汚れなし
                    'name' => 'HDD',
                    'price' => 5000,
                    'brand' => '西芝',
                    'image' => 'items/hdd.png',
                    'description' => '高速で信頼性の高いハードディスク'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 3, // やや傷や汚れあり
                    'name' => '玉ねぎ3束',
                    'price' => 300,
                    'brand' => 'なし',
                    'image' => 'items/onions.png',
                    'description' => '新鮮な玉ねぎ3束のセット'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 4, // 状態が悪い（状態普通が無いため）
                    'name' => '革靴',
                    'price' => 4000,
                    'brand' => null,
                    'image' => 'items/leather-shoes.png',
                    'description' => 'クラシックなデザインの革靴'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 1, // 良好
                    'name' => 'ノートPC',
                    'price' => 45000,
                    'brand' => null,
                    'image' => 'items/PC.png',
                    'description' => '高性能なノートパソコン'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 2, // 目立った傷や汚れなし
                    'name' => 'マイク',
                    'price' => 8000,
                    'brand' => 'なし',
                    'image' => 'items/mic.png',
                    'description' => '高音質のレコーディング用マイク'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 3, // やや傷や汚れあり
                    'name' => 'ショルダーバッグ',
                    'price' => 3500,
                    'brand' => null,
                    'image' => 'items/bag.png',
                    'description' => 'おしゃれなショルダーバッグ'
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 4, // 状態が悪い
                    'name' => 'タンブラー',
                    'price' => 500,
                    'brand' => 'なし',
                    'image' => 'items/tumbler.png',
                    'description' => '使いやすいタンブラー',
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 1, // 良好
                    'name' => 'コーヒーミル',
                    'price' => 4000,
                    'brand' => 'Starbucks',
                    'image' => 'items/coffee.png',
                    'description' => '手動のコーヒーミル',
                ],
                [
                    'user_id' => $userIds->random(),
                    'condition_id' => 2, // 目立った傷や汚れなし
                    'name' => 'メイクセット',
                    'price' => 2500,
                    'brand' => null,
                    'image' => 'items/makeup.png',
                    'description' => '便利なメイクアップセット',
                ],
            ]
        );
    }
}
