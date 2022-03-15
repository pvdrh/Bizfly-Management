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
                'name' => 'Công ty công nghệ',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty một thành viên',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty Vinamilk',
            ]
        ]);

        DB::table('companies')->insert([
            [
                'name' => 'Công ty May 10',
            ]
        ]);
    }
}
