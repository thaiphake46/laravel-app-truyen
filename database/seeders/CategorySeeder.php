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
            'Huyền Huyễn',
            'Võng Du',
            'Đồng Nhân',
            'Cạnh Kỹ',
            'Kiếm hiệp',
            'Tiên hiệp',
            'Khoa Huyễn',
            'Đô Thị',
            'Dã Sử',
            'Huyền Nghi',
            'Kỳ Ảo'
        ];

        $listInsert = array();
        foreach ($list as $key => $value) {
            array_push(
                $listInsert,
                ['slug' => Str::slug($value, '_'), 'name' => $value]
            );
        }

        DB::table('categories')->insert($listInsert);
    }
}
