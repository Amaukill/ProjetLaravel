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
            ['name' => 'Ryzen 5 5600X', 'price' => '350', 'categorie_id' => '1', 'description'=> 'Le Ryzen 5 5600X est un processeur'],
            ['name' => 'Ryzen 5 5800X', 'price' => '450', 'categorie_id' => '1', 'description'=> 'Le Ryzen 5 5800X est un processeur'],
            ['name' => 'RTX 3070', 'price' => '800', 'categorie_id' => '2', 'description'=> 'La RTX 3070 est une carte graphique'],
            ['name' => 'RTX 3080', 'price' => '1500', 'categorie_id' => '2', 'description'=> 'La RTX 3080 est une carte graphique'],
            ['name' => 'GTX 730', 'price' => '2', 'categorie_id' => '2', 'description'=> 'La GTX 730 est une carte graphique'],
            ['name' => 'MSI B450', 'price' => '100', 'categorie_id' => '3', 'description'=> 'La MSI B450 est une carte mère'],
            ['name' => 'WD 1To', 'price' => '50€', 'categorie_id' => '4', 'description'=> 'Un disque dur Western Digital 1To'],
            ['name' => 'Samsung 970 EVO ', 'price' => '100', 'categorie_id' => '5', 'description'=> 'Le Samsung 970 EVO est un SSD'],
            ['name' => 'HyperX 2x16Go', 'price' => '120', 'categorie_id' => '6', 'description'=> '2x16Go de ram de la marque HyperX'],
        ];

        DB::table('roles')->insert($roles);
        DB::table('users')->insert($users);
        DB::table('categories')->insert($categories);
        DB::table('articles')->insert($articles);
    }
}
