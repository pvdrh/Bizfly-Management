<?php

namespace Database\Seeders;

use App\Models\UserInfo;
use Illuminate\Database\Seeder;
use App\Models\User;
use \Illuminate\Support\Facades\DB;

class UserInfoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email','admin@gmail.com')->first()->_id;
        DB::table('user_info')->insert([
            [
                'role' => UserInfo::ROLE['admin'],
                'gender' => 1,
                'name' => 'Phạm Văn Duy',
                'address' => 'Thanh Xuân, Hà Nội',
                'user_id' => $admin
            ]
        ]);

        $employee = User::where('email','employee@gmail.com')->first()->_id;
        DB::table('user_info')->insert([
            [
                'role' => UserInfo::ROLE['employee'],
                'gender' => 1,
                'name' => 'Phạm Văn Duy',
                'address' => 'Thanh Xuân, Hà Nội',
                'user_id' => $employee
            ]
        ]);
    }
}
