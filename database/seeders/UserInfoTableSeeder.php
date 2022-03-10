<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
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
        $roleSuperAdmin = Role::where('name', 'Super Admin')->first()->_id;
        $user_id = User::first()->_id;
        DB::table('user_info')->insert([
            [
                'role_id' => $roleSuperAdmin,
                'gender' => 1,
                'name' => 'Phạm Văn Duy',
                'address' => 'Thanh Xuân, Hà Nội',
                'user_id' => $user_id
            ]
        ]);
    }
}
