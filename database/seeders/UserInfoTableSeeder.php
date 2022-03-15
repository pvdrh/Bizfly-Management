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
                'name' => 'Quan Tri Vien',
                'address' => 'Ha Noi',
                'phone' => '0835904783',
                'user_id' => $admin,
                'is_protected' => true,
                'code' => (string)rand(1000, 9999)
            ]
        ]);

        $employee = User::where('email', 'employee@gmail.com')->first()->_id;
        DB::table('user_info')->insert([
            [
                'role' => UserInfo::ROLE['employee'],
                'gender' => 0,
                'name' => 'Nhan Vien',
                'phone' => '0931884553',
                'address' => 'Ha Noi',
                'user_id' => $employee,
                'is_protected' => true,
                'code' => (string)rand(1000, 9999)
            ]
        ]);
    }
}
