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
        $roles = [
            ['name'=>'admin'],
            ['name'=>'user'],
        ];


        $users = [
            ['login' => 'amaukill', 'password'=>Hash::make('issou'), 'role_id'=>1],
            ['login' => 'loic', 'password'=>Hash::make('loic'), 'role_id'=>1],
            ['login' => 'Brice', 'password'=>Hash::make('apps'), 'role_id'=>2],
        ];

        $categories = [
            ['name' => 'Processeur'],
            ['name' => 'Carte graphique'],
            ['name' => 'Carte mère'],
            ['name' => 'HDD'],
            ['name' => 'SSD'],
            ['name' => 'RAM'],
        ];

        $articles = [
            ['name' => 'Ryzen 5 5600X', 'price' => '350€', 'categorie_id' => '1'],
            ['name' => 'Ryzen 5 5800X', 'price' => '450€', 'categorie_id' => '1'],
            ['name' => 'RTX 3070', 'price' => '800€', 'categorie_id' => '2'],
            ['name' => 'RTX 3080', 'price' => '1500€', 'categorie_id' => '2'],
            ['name' => 'GTX 730', 'price' => '2€', 'categorie_id' => '2'],
            ['name' => 'MSI B450', 'price' => '100€', 'categorie_id' => '3'],
            ['name' => 'WD 1TO', 'price' => '50€', 'categorie_id' => '4'],
            ['name' => 'Samsung 970 EVO ', 'price' => '100€', 'categorie_id' => '5'],
            ['name' => 'Hyper X 2x16Go', 'price' => '120€', 'categorie_id' => '6'],
        ];

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($users);
        DB::table('categories')->insert($categories);
        DB::table('articles')->insert($articles);
    }
}
