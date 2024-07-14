<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $major_category_names = [
            '和食','洋食','魚介・海鮮料理','パスタ','ピザ','手羽先','カレー'
        ];

        foreach ($major_category_names as $major_category_name) {
            Category::create([
                'name' => $major_category_name
            ]);
        }
    }
}
