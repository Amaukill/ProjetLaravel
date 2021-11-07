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
        $categories = [
            ['name' => 'Processeur'],
            ['name' => 'Carte graphique'],
            ['name' => 'Carte mère'],
            ['name' => 'HDD'],
            ['name' => 'SSD'],
            ['name' => 'RAM'],
        ];

        $roles = [
            ['name'=>'admin'],
            ['name'=>'user'],
        ];


        $users = [
            ['login' => 'amaukill', 'password'=>Hash::make('issou'), 'role_id'=>1],
            ['login' => 'loic', 'password'=>Hash::make('loic'), 'role_id'=>1],
            ['login' => 'Brice', 'password'=>Hash::make('apps'), 'role_id'=>2],
        ];

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($users);
        DB::table('categories')->insert($categories);
    }
}
