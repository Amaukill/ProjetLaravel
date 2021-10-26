<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'password'=>Hash::make('issou'),
            'role_id'=>1

        ]);
        DB::table('users')->insert([
            'login'=>'loic',
            'password'=>Hash::make('loic'),
            'role_id'=>1

        ]);
        DB::table('users')->insert([
            'login'=>'Brice',
            'password'=>Hash::make('apps'),
            'role_id'=>2

        ]);
    }
}
