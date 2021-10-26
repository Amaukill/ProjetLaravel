<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'=>'admin'
        ]);
        DB::table('roles')->insert([
            'name'=>'user'
        ]);
        DB::table('users')->insert([
            'login'=>'amaukill',
            'password'=>'issou',
            'role_id'=>1

        ]);
        DB::table('users')->insert([
            'login'=>'loic',
            'password'=>'loic',
            'role_id'=>1

        ]);
        DB::table('users')->insert([
            'login'=>'Brice',
            'password'=>'apps',
            'role_id'=>2

        ]);
    }
}
