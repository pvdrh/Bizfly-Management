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
        DB::table('users')->insert([
            [
                'email' => 'admin@gmail.com',
                'password' => Hash::make('000000'),
            ]
        ]);

        DB::table('users')->insert([
            [
                'email' => 'employee@gmail.com',
                'password' => Hash::make('000000'),
            ]
        ]);
    }
}
