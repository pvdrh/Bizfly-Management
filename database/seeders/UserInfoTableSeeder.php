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
        $admin = User::where('email', 'admin@gmail.com')->first()->_id;
        DB::table('user_info')->insert([
            [
                'role' => UserInfo::ROLE['admin'],
                'gender' => 1,
                'name' => 'Quản trị viên',
                'address' => 'Thanh Xuân, Hà Nội',
                'phone' => '0835904783',
                'user_id' => $admin,
                'is_protected' => true,
                'code' => rand(1000, 9999)
            ]
        ]);

        $employee = User::where('email', 'employee@gmail.com')->first()->_id;
        DB::table('user_info')->insert([
            [
                'role' => UserInfo::ROLE['employee'],
                'gender' => 0,
                'name' => 'Nhân viên',
                'phone' => '0931884553',
                'address' => 'Hai Bà Trưng, Hà Nội',
                'user_id' => $employee,
                'is_protected' => true,
                'code' => rand(1000, 9999)
            ]
        ]);
    }
}
