<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use \Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roleSuperAdmin = Role::where('name', 'Super Admin')->first()->_id;
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@bizfly.vn',
                'phone' => '0835904783',
                'password' => Hash::make('000000'),
                'role_id' => $roleSuperAdmin,
                'address' => 'Số 1 Nguyễn Huy Tưởng, Thanh Xuân, Hà Nội',
                'gender' => 1,
                'date_of_birth' => 1642210565
            ]
        ]);
    }
}
