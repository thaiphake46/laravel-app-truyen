<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $list = [
            'Tiểu thuyết',
            'Truyện ngắn',
            'Truyện dài',
            'Kỳ bí',
            'Kinh dị',
            'Khoa học viễn tưởng',
            'Lịch sử',
            'Tình cảm',
            'Phiêu lưu',
            'Hài hước',
        ];

        $listInsert = array();
        foreach ($list as $key => $value) {
            array_push(
                $listInsert,
                ['slug' => Str::slug($value, '_'), 'name' => $value, 'description' => 'Mô tả ' . $value]
            );
        }

        DB::table('categories')->insert($listInsert);
    }
}
