<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'name' => 'Điện thoại',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Phụ kiện',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Đồng hồ thông minh',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Máy tính bảng',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Laptop',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'PC',
            ]
        ]);

        DB::table('categories')->insert([
            [
                'name' => 'Máy cũ giá rẻ',
            ]
        ]);
    }
}
