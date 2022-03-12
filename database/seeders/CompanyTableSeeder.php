<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use \Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('companies')->insert([
            [
                'name' => 'Công ty một thành viên',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty hai thành viên',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty ba thành viên',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty bốn thành viên',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty năm thành viên',
            ]
        ]);
    }
}
